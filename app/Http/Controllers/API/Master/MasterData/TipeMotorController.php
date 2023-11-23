<?php

namespace App\Http\Controllers\API\Master\MasterData;

use App\Http\Controllers\Controller;
use App\Models\TipeMotor;
use App\Http\Requests\{
    TipeMotorRequest,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class TipeMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipeMotor = TipeMotor::get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $tipeMotor,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipeMotorRequest $request)
    {
        $response = $request->store();

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipeMotorRequest $request)
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
            $tipeMotor = TipeMotor::findOrFail($id);

            $tipeMotor->delete();

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
