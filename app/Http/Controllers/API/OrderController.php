<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\{
    Order,
    OrderDetail,
    ServiceDetail,
};
use App\Http\Requests\{
    StoreOrderRequest,
    UpdateOrderRequest,
};

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::with('pelanggan', 'orderDetail', 'serviceDetail')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $order,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function detailOrder($order_id)
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
