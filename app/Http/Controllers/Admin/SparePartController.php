<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Http,
    Log,
};

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Spare Part';

        $sparePart = Http::get(url('http://true-bengkel-v2.test/api/spare-part'))->object();
        $brand = Http::get(url('http://true-bengkel-v2.test/api/brand'))->object();
        $tipeMotor = Http::get(url('http://true-bengkel-v2.test/api/tipe-motor'))->object();

        $data['sparePart'] = $sparePart->data;
        $data['listBrand'] = $brand->data;
        $data['listTipeMotor'] = $tipeMotor->data;

        return view('dashboard.database.spare-part.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'spare_part_code', 'name', 'brand_id', 'tipe_motor_id', 'headline',
            'description', 'stock', 'price',
        ]);

        try {
            Http::post(url('http://true-bengkel-v2.test/api/spare-part/store'), $data)->object();

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
