<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Kendaraan';

        $kendaraan = Http::get(url('http://true-bengkel-v2.test/api/kendaraan'))->object();

        $data['kendaraan'] = $kendaraan->data;

        return view('dashboard.database.kendaraan.index', $data);
    }
}
