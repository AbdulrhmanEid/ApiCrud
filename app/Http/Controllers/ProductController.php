<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([$products]);
    }
    public function selected(){
        $products = Product::select('name','price')->get();
        return response()->json($products);
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
    public function store(Request $request)
    {
        $data = $request->all();
        $product = Product::create($data);
        return response()->json([
            "message"=>'Product inserted succfully',
            "status"=>200,
            "product"=>$product,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $product = Product::findorfail($id);
        return response()->json($product);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product= new Product();
        $product = Product::findorfail($id);
        $product->update($data);
        return response()->json([
            "message"=>"product updaed",
            "product"=>$product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product ::destroy($id);
        return response()->json([
            "message"=>"product deleted successfully",
            "status"=>200,
        ]);


    }
}
