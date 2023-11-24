<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Models\{
    About,
};
use App\Http\Requests\{
    AboutRequest,
};

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $about,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request)
    {
        $response = $request->update($request);

        return response()->json($response, 200);
    }
}
