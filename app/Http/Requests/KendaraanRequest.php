<?php

namespace App\Http\Requests;

use App\Models\{
    Kendaraan,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Log,
};

class KendaraanRequest extends FormRequest
{
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
            'stnk' => 'required|string|unique:kendaraans',
            'pelanggan_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'tipe_motor_id' => 'required|integer',
            'no_mesin' => 'required|string|unique:kendaraans',
            'no_rangka' => 'required|string|unique:kendaraans',
            'tahun' => 'required|integer',
            'warna' => 'required|string',
        ];
    }

    public function store()
    {
        try {
            $data = $this->validated();

            $kendaraan = Kendaraan::create($data);

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
            'data' => $kendaraan,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $kendaraan = Kendaraan::findOrFail($request->id);

            $kendaraan->update($data);

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
            'data' => $kendaraan,
        ];
    }
}
