<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
    $products = Product::all();

    return response([
        'message' => 'success',
        'data' => $products,
    ]);
    }

    public function store(Request $request, ){
        Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return response([
            'message' => 'Product created',
            'data' => $request->all()
        ]);
    }

    public function show($id){
        $product = Product::findOrFail($id);

        return response([
            'message' => 'Success',
            'data' => $product,
        ], 200);
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);

        $product->update($request->all());

        $product->refresh();

        return response([
            'message' => 'Product updated',
            'data' => $product,
        ]);

    }
    public function delete($id){
        $product = Product::findOrFail($id);

        $product->delete($id);

        return response([
            'message' => 'Product deleted',
        ]);
    }
}
