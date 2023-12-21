<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $orders = Order::with(['driver', 'package'])->paginate();

        return OrderResource::collection($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
         $Orders=Order::create($request->validated());

          return New OrderResource($Orders);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $Order)
    {
        $Order->load(['driver', 'package']);

        return new OrderResource($Order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $Order)
    {
        $Order->update($request->validated());

        return response()->json(['message'=>'Order updated ']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $Order)
    {
        $Order->delete();

        return response()->json(['message'=>'Order deleted']);
    }
}
