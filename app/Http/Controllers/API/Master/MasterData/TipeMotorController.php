<?php

namespace App\Http\Controllers\API\Master\MasterData;

use App\Http\Controllers\Controller;
use App\Models\TipeMotor;
use App\Http\Requests\{
    StoreTipeMotorRequest,
    UpdateTipeMotorRequest,
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipeMotorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipeMotor $tipeMotor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeMotor $tipeMotor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipeMotorRequest $request, TipeMotor $tipeMotor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeMotor $tipeMotor)
    {
        //
    }
}