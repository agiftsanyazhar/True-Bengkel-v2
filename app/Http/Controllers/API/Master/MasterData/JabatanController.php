<?php

namespace App\Http\Controllers\API\Master\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Http\Requests\{
    JabatanRequest,
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
        $response = $request->store();

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
    public function destroy(Jabatan $jabatan)
    {
        //
    }
}
