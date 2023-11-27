<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    private function getData($endpoint)
    {
        return Http::get(url('http://true-bengkel-v2.test/api/' . $endpoint))->object();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Dashboard';

        $order = $this->getData('order');

        $data['order'] = $order->data;

        return view('dashboard.index', $data);
    }
}
