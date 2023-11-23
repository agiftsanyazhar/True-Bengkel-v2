<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Models\ServiceDetail;
use App\Http\Requests\{
    StoreServiceDetailRequest,
    UpdateServiceDetailRequest,
};

class ServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreServiceDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceDetailRequest $request, ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceDetail $serviceDetail)
    {
        //
    }
}