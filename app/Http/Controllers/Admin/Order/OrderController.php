<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
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
        $data['title'] = 'Order';

        $order = $this->getData('order');

        $data['order'] = $order->data;

        return view('dashboard.order.index', $data);
    }
}
