<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class OrderDetailController extends Controller
{
    private function getData($endpoint)
    {
        return Http::get(url('http://true-bengkel-v2.test/api/order/detail/' . $endpoint))->object();
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data['title'] = 'Order Detail';

        $order = $this->getData($id);

        $data['orderCode'] = $order->data->orderDetail[0]->order->order_code;

        $data['orderDetail'] = $order->data->orderDetail;
        $data['serviceDetail'] = $order->data->serviceDetail;

        return view('dashboard.order.order-detail', $data);
    }
}
