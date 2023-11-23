<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            $token = $user->createToken('myAppToken');

            $responseData = [
                'success' => true,
                'message' => 'Success',
                'data' => (new UserResource($user))->toArray($request),
                'token' => $token->plainTextToken,
            ];

            return response()->json($responseData);
        }

        return response()->json([
            'message' => 'Your credential does not match.',
        ], 401);
    }
}
