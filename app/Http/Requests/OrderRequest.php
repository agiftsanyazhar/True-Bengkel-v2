<?php

namespace App\Http\Requests;

use App\Models\{
    Order,
    OrderDetail,
    ServiceDetail,
    SparePart,
};
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Log,
    Storage,
};

class OrderRequest extends FormRequest
{
    private $uploadPath;

    public function __construct()
    {
        $this->uploadPath = 'uploads/bukti-pembayaran/';
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'order_code' => 'string',
            'pelanggan_id' => 'required|integer',
            'is_service' => 'required|integer',
            'is_paid' => 'required|integer',
            'total_shopping' => 'integer',
            'order_id' => 'integer',
            'spare_part_id' => 'integer',
            'qty' => 'integer',
            'name' => 'string',
            'harga_satuan' => 'integer',
        ];
    }

    public function store($request)
    {
        try {
            $data = $this->validated();

            $data['order_code'] = 'ODR-' . Carbon::now()->format('dmYHis');

            if ($request->hasFile('bukti_pembayaran')) {
                $imageName = $request->validate([
                    'bukti_pembayaran' => 'mimes:jpeg,jpg,png|max:2048'
                ]);

                $imageName = $request->file('bukti_pembayaran');
                $data['bukti_pembayaran'] = $imageName->store($this->uploadPath);
            }

            $order = Order::create($data);

            $orderId = $order->id;

            $sparePart = SparePart::find($request->spare_part_id);

            $hargaSatuan = $sparePart->price;

            $order = Order::find($orderId);

            $totalShopping = ($hargaSatuan * $data['qty']) + $request->harga_jasa;
            $order->total_shopping += $totalShopping;

            $order->save();

            $sparePart->stock = $sparePart->stock - $data['qty'];

            $sparePart->save();

            OrderDetail::create([
                'order_id' => $orderId,
                'spare_part_id' => $request->spare_part_id,
                'qty' => $request->qty,
                'harga_satuan' => $hargaSatuan,
            ]);

            ServiceDetail::create([
                'order_id' => $orderId,
                'name' => $request->name,
                'qty' => $request->qty,
                'harga_jasa' => $request->harga_jasa,
            ]);

            $success = true;
            $message = 'Success';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $success = false;
            $message = 'Failure. ' . $e->getMessage();
        }

        return [
            'success' => $success,
            'message' => $message,
            'data' => $order,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $order = Order::findOrFail($request->id);

            if ($request->hasFile('bukti_pembayaran')) {
                $imageName = $request->validate([
                    'bukti_pembayaran' => 'mimes:jpeg,jpg,png|max:2048'
                ]);

                $imageName = $request->file('bukti_pembayaran');
                $data['bukti_pembayaran'] = $imageName->store($this->uploadPath);

                if ($order->bukti_pembayaran) {
                    Storage::delete($order->bukti_pembayaran);
                }
            }

            $order->update($data);

            $success = true;
            $message = 'Success';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $success = false;
            $message = 'Failure. ' . $e->getMessage();
        }

        return [
            'success' => $success,
            'message' => $message,
            'data' => $order,
        ];
    }
}
