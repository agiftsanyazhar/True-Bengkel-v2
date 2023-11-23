<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Http\Requests\{
    MotorRequest,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motor = Motor::with('brand', 'tipeMotor')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $motor,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MotorRequest $request)
    {
        $response = $request->store();

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MotorRequest $request)
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
            $motor = Motor::findOrFail($id);

            $motor->delete();

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
