<?php

namespace App\Http\Requests;

use App\Models\{
    Pegawai,
    User,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Hash,
    Log,
};
use Illuminate\Support\Str;

class PegawaiRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required|string',
            'alamat' => 'required|string',
            'description' => 'string',
            'jabatan_id' => 'integer',
            'role_id' => 'integer',
        ];
    }

    public function store($request)
    {
        try {
            $this->validated();

            $user = User::create([
                'name' => Str::title($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2,
            ]);

            $userId = $user->id;

            $pegawai = Pegawai::create([
                'name' => Str::title($request->name),
                'email' => $request->email,
                'phone' => $request->phone,
                'alamat' => $request->alamat,
                'description' => $request->description,
                'user_id' => $userId,
                'jabatan_id' => $request->jabatan_id,
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
            'data' => $pegawai,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $pegawai = Pegawai::findOrFail($request->id);

            $pegawai->update($data);

            User::where('id', $pegawai->user->id)->update([
                'name' => Str::title($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2,
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
            'data' => $pegawai,
        ];
    }
}
