<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\{
    Pelanggan,
    User,
};
use App\Http\Requests\{
    PelangganRequest,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::with('user')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $pelanggan,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PelangganRequest $request)
    {
        $response = $request->store($request);

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PelangganRequest $request)
    {
        $response = $request->update($request);

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            User::where('id', $pelanggan->user->id)->delete();

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
