<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Http\Requests\{
    KendaraanRequest,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::with('pelanggan', 'brand', 'tipeMotor')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $kendaraan,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KendaraanRequest $request)
    {
        $response = $request->store();

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KendaraanRequest $request)
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
            $kendaraan = Kendaraan::findOrFail($id);

            $kendaraan->delete();

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
