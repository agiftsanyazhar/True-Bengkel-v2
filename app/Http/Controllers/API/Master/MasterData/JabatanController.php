<?php

namespace App\Http\Controllers\API\Master\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Http\Requests\{
    JabatanRequest,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $jabatan,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanRequest $request)
    {
        $response = $request->store($request);

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JabatanRequest $request)
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
            $jabatan = Jabatan::findOrFail($id);

            $jabatan->delete();

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
