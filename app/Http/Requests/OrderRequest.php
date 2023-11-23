<?php

namespace App\Http\Requests;

use App\Models\{
    Order,
};
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
            'pelanggan_id' => 'required|integer',
            'is_service' => 'required|integer',
            'is_paid' => 'required|integer',
            'total_shopping' => 'required|integer',
        ];
    }

    public function store($request)
    {
        try {
            $data = $this->validated();

            if ($request->hasFile('bukti_pembayaran')) {
                $imageName = $request->validate([
                    'bukti_pembayaran' => 'mimes:jpeg,jpg,png|max:2048'
                ]);

                $imageName = $request->file('bukti_pembayaran');
                $data['bukti_pembayaran'] = $imageName->store($this->uploadPath);
            }

            $order = Order::create($data);

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
                Storage::delete($order->bukti_pembayaran);
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
