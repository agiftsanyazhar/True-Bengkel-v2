<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Http,
    Log,
};

class AuthenticatedSessionController extends Controller
{
    private $http;

    public function __construct()
    {
        $this->http = new Client();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Sign In';

        return view('auth.login', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;

            $response = $this->http->post(url('api/auth/login'), [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session()->get('token.access_token'),
                ],
                'form_params' => [
                    'email' => $email,
                    'password' => $password,
                ],
            ]);

            $status = 'success';
            $message = 'Welcome!';

            return redirect()->route('admin.dashboard.index')->with($status, $message);
        } catch (\Exception $e) {
            $status = 'danger';
            $message = 'Sorry! Try again later. ' . $e->getMessage();

            Log::error($e->getMessage());

            return redirect()->back()->with($status, $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $request->validate([
                'token' => 'required|same:' . csrf_token(),
            ]);

            $user = auth()->user();

            Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $user->token,
            ])->post(url('api/auth/logout'));

            $user->token = null;

            $user->save();

            $status = 'success';
            $message = 'Welcome!';

            return redirect('/login')->with($status, $message);
        } catch (\Exception $e) {
            $status = 'danger';
            $message = 'Sorry! Try again later. ' . $e->getMessage();

            Log::error($e->getMessage());

            return redirect()->back()->with($status, $message);
        }
    }
}
