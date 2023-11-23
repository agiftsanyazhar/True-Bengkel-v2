<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\{
    Admin,
    User,
};
use App\Http\Requests\{
    AdminRequest,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::with('user')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $admin,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $response = $request->store($request);

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request)
    {
        $response = $request->update($request);

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        try {
            $admin = Admin::findOrFail($id);

            User::where('id', $admin->user->id)->delete();

            $success = true;
            $message = 'Success';
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());

            $success = false;
            $message = 'Failure. ' . $e->getMessage();
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ], 200);
    }
}
