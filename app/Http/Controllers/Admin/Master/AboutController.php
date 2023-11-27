<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Http,
    Log,
};

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'About';

        $about = Http::get(url('http://true-bengkel-v2.test/api/about'))->object();

        $data['about'] = $about->data;

        return view('dashboard.master.about.index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only([
            'name', 'headline', 'description', 'location', 'map', 'email', 'phone',
            'opening_hours', 'closing_hours', 'hero_image', 'about_image'
        ]);

        try {
            $request->validate([
                'name' => 'required|string',
                'headline' => 'required|string',
                'description' => 'required|string',
                'location' => 'required|string',
                'map' => 'required|string',
                'email' => 'required|string|email:rfc,dns|unique:users,email',
                'phone' => 'required|string|unique:pegawais,phone|unique:pelanggans,phone',
                'opening_hours' => 'required|string',
                'closing_hours' => 'required|string',
                'hero_image' => 'required|mimes:jpeg,jpg,png|max:2048',
                'about_image' => 'required|mimes:jpeg,jpg,png|max:2048',
            ]);

            Http::post(url('http://true-bengkel-v2.test/api/about/update/' . $request->id), $data)->object();

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            $status = 'danger';
            $message = 'Failed to Save. ' . $e->getMessage();

            Log::debug($e->getMessage());
        }

        return redirect()->back()->with($status, $message);
    }
}
