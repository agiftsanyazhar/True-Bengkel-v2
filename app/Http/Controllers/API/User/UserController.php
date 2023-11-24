<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('role')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $user,
        ], 200);
    }
}
