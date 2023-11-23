<?php

namespace App\Http\Requests;

use App\Models\{
    Admin,
    User,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\{
    Hash,
    Log,
};
use Illuminate\Support\Str;

class AdminRequest extends FormRequest
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
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:8',
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
                'role_id' => 1,
            ]);

            $userId = $user->id;

            $admin = Admin::create([
                'name' => Str::title($request->name),
                'email' => $request->email,
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
            'data' => $admin,
        ];
    }

    public function update($request)
    {
        try {
            $data = $this->validated();

            $admin = Admin::findOrFail($request->id);

            $admin->update($data);

            User::where('id', $admin->user->id)->update([
                'name' => Str::title($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 1,
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
            'data' => $admin,
        ];
    }
}
