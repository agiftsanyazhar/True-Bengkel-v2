<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($token)
    {
        $data['title'] = 'Reset Password';

        return view('auth.reset-password', ['token' => $token], $data);
    }
}
