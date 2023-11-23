<?php

namespace App\Http\Requests;

use App\Models\Jabatan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class JabatanRequest extends FormRequest
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
            'name' => 'required|string|unique:jabatans,name',
            'gaji_pokok' => 'required|integer',
            'tunjangan' => 'integer',
        ];
    }

    public function store()
    {
        try {
            $data = $this->validated();

            $data['name'] = Str::title($data['name']);

            $jabatan = Jabatan::create($data);

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
            'data' => $jabatan,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $jabatan = Jabatan::findOrFail($request->id);

            $data['name'] = Str::title($request->name);

            $jabatan->update($data);

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
            'data' => $jabatan,
        ];
    }
}
