<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
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
            'message' => 'These credentials do not match our records.',
        ], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        try {
            auth()->logout();

            auth()->logout(true);

            $success = true;
            $message = 'Success';
        } catch (\Exception $e) {
            $success = false;
            $message = 'Failure';
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
