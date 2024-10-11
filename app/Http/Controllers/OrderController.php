<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();

        return response([
            'message' => 'Success',
            'data' => $orders
        ]);
    }
    public function show($id){
        $order = Order::findOrFail($id);

        return response([
            'message' => 'success',
            'data' => $order
        ]);
    }
    public function store(Request $request){
        Order::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_amount' => $request->total_amount,
            'price' => $request->price,
        ]);
    }
    public function update(Request $request, $id){
        $order = Order::findOrFail($id);

        $order->update($request->all());
        // return response()->json([
        //     'message' => 'Order updated',
        //     'data' => $order
        // ]);

        return response([
            'message' => 'Order updated',
            'data' => $order
        ]);
    }
    public function delete($id){
        $order = Order::findOrFail($id);

        $order->delete($id);

        return response([
            'message' => 'Order deleted'
        ]);
    }
}
