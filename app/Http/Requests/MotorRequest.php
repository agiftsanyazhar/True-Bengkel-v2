<?php

namespace App\Http\Requests;

use App\Models\{
    Motor,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Log,
};


class MotorRequest extends FormRequest
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
            'name' => 'required|string|unique:motors',
            'brand_id' => 'required|integer',
            'tipe_motor_id' => 'required|integer',
        ];
    }

    public function store()
    {
        try {
            $data = $this->validated();

            $motor = Motor::create($data);

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
            'data' => $motor,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $motor = Motor::findOrFail($request->id);

            $motor->update($data);

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
            'data' => $motor,
        ];
    }
}
