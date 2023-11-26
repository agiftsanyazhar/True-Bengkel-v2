<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SparePart;
use App\Http\Requests\{
    SparePartRequest,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sparePart = SparePart::with('brand', 'tipeMotor')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $sparePart,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SparePartRequest $request)
    {
        $response = $request->store($request);

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SparePartRequest $request)
    {
        $response = $request->update($request);

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $sparePart = SparePart::where('id', $id)->with('brand', 'tipeMotor')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $sparePart,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $sparePart = SparePart::findOrFail($id);

            $sparePart->delete();

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
