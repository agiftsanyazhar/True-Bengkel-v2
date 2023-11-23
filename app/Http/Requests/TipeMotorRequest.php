<?php

namespace App\Http\Requests;

use App\Models\{
    TipeMotor,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Log,
};

class TipeMotorRequest extends FormRequest
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
            'name' => 'required|string|unique:tipe_motors',
        ];
    }

    public function store()
    {
        try {
            $data = $this->validated();

            $tipeMotor = TipeMotor::create($data);

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
            'data' => $tipeMotor,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $tipeMotor = TipeMotor::findOrFail($request->id);

            $tipeMotor->update($data);

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
            'data' => $tipeMotor,
        ];
    }
}
