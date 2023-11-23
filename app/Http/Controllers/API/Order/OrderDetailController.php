<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Http\Requests\{
    StoreOrderDetailRequest,
    UpdateOrderDetailRequest,
};

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function show($order_id)
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
