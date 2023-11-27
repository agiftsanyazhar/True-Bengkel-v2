<?php

namespace App\Http\Controllers\Admin\Master\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Http,
    Log,
};

class TipeMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Tipe Motor';

        $tipeMotor = Http::get(url('http://true-bengkel-v2.test/api/tipe-motor'))->object();

        $data['tipeMotor'] = $tipeMotor->data;

        return view('dashboard.master.master-data.tipe-motor.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['name']);

        try {
            $request->validate([
                'name' => 'required|string|unique:tipe_motors',
            ]);

            Http::post(url('http://true-bengkel-v2.test/api/tipe-motor/store'), $data)->object();

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            $status = 'danger';
            $message = 'Failed to Save. ' . $e->getMessage();

            Log::debug($e->getMessage());
        }

        return redirect()->back()->with($status, $message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->only(['name']);

        try {
            $request->validate([
                'name' => 'required|string|unique:tipe_motors',
            ]);

            Http::post(url('http://true-bengkel-v2.test/api/tipe-motor/update/' . $request->id), $data)->object();

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            $status = 'danger';
            $message = 'Failed to Save. ' . $e->getMessage();

            Log::debug($e->getMessage());
        }

        return redirect()->back()->with($status, $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Http::get(url('http://true-bengkel-v2.test/api/tipe-motor/destroy/' . $id))->object();

            $status = 'success';
            $message = 'Deleted Successfully';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $status = 'danger';
            $message = 'Failed to Delete. ' . $e->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }
}
