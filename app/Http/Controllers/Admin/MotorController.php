<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Http,
    Log,
};

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Motor';

        $motor = Http::get(url('http://true-bengkel-v2.test/api/motor'))->object();
        $brand = Http::get(url('http://true-bengkel-v2.test/api/brand'))->object();
        $tipeMotor = Http::get(url('http://true-bengkel-v2.test/api/tipe-motor'))->object();

        $data['listBrand'] = $brand->data;
        $data['listTipeMotor'] = $tipeMotor->data;

        $data['motor'] = $motor->data;

        return view('dashboard.database.motor.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'brand_id', 'tipe_motor_id']);

        try {
            $request->validate([
                'name' => 'required|string',
                'brand_id' => 'required|integer',
                'tipe_motor_id' => 'required|integer',
            ]);

            Http::post(url('http://true-bengkel-v2.test/api/motor/store'), $data)->object();

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
        $data = $request->only(['name', 'brand_id', 'tipe_motor_id']);

        try {
            $request->validate([
                'name' => 'required|string',
                'brand_id' => 'required|integer',
                'tipe_motor_id' => 'required|integer',
            ]);

            Http::post(url('http://true-bengkel-v2.test/api/motor/update/' . $request->id), $data)->object();

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
    public function destroy(string $id)
    {
        try {
            Http::get(url('http://true-bengkel-v2.test/api/motor/destroy/' . $id))->object();

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
