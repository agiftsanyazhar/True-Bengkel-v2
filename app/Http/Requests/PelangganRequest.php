<?php

namespace App\Http\Requests;

use App\Models\{
    Pelanggan,
    User,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Hash,
    Log,
};
use Illuminate\Support\Str;

class PelangganRequest extends FormRequest
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
                'role_id' => 3,
            ]);

            $userId = $user->id;

            $pelanggan = Pelanggan::create([
                'name' => Str::title($request->name),
                'email' => $request->email,
                'phone' => $request->phone,
                'alamat' => $request->alamat,
                'user_id' => $userId,
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
            'data' => $pelanggan,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $pelanggan = Pelanggan::findOrFail($request->id);

            $pelanggan->update($data);

            User::where('id', $pelanggan->user->id)->update([
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
            'data' => $pelanggan,
        ];
    }
}
