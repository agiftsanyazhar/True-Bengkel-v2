<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Models\{
    Order,
};
use App\Http\Requests\{
    OrderRequest,
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
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $response = $request->store($request);

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request)
    {
        $response = $request->update($request);

        return response()->json($response, 200);
    }
}
