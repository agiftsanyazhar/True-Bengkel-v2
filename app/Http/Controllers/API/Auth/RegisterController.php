<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\{
    Admin,
    Pegawai,
    Pelanggan,
    User,
};
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:8',
            'role_id' => 'required|integer',
            'phone' => 'string',
            'alamat' => 'string',
            'description' => 'string',
            'jabatan_id' => 'integer',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        $userId = $user->id;

        if ($request->role_id == 1) {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_id' => $userId,
            ]);
        } else if ($request->role_id == 2) {
            $pegawai = Pegawai::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'alamat' => $request->alamat,
                'user_id' => $userId,
                'description' => $request->description,
                'jabatan_id' => $request->jabatan_id,
            ]);
        } else if ($request->role_id == 3) {
            $pelanggan = Pelanggan::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'alamat' => $request->alamat,
                'user_id' => $userId,
            ]);
        }

        $token = $user->createToken('myAppToken');

        $responseData = [
            'success' => true,
            'message' => 'Success',
            'data' => (new UserResource($user))->toArray($request),
            'token' => $token->plainTextToken,
        ];

        return response()->json($responseData);
    }
}
