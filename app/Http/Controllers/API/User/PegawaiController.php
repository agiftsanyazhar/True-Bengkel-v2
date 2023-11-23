<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\{
    Pegawai,
    User,
};
use App\Http\Requests\{
    PegawaiRequest,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::with('user')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $pegawai,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PegawaiRequest $request)
    {
        $response = $request->store($request);

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PegawaiRequest $request)
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
            $pegawai = Pegawai::findOrFail($id);

            User::where('id', $pegawai->user->id)->delete();

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
