<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Models\{
    OrderDetail,
    ServiceDetail
};


class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($order_id)
    {
        $orderDetail = OrderDetail::where('order_id', $order_id)->get();
        $serviceDetail = ServiceDetail::where('order_id', $order_id)->get();

        $data = compact('orderDetail', 'serviceDetail');

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $data,
        ], 200);
    }
}
