<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\{
    StoreRoleRequest,
    UpdateRoleRequest,
};

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $role,
        ], 200);
    }
}
