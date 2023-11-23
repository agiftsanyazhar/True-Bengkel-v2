<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Http\Requests\{
    GalleryRequest,
};
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $gallery,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $response = $request->store($request);

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request)
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
            $gallery = Gallery::findOrFail($id);

            $gallery->delete();

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
