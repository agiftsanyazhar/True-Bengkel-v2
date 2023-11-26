<?php

namespace App\Http\Controllers\Admin\Master\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipeMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Tipe Motor';

        return view('dashboard.master.master-data.tipe-motor.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
