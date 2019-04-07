<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'product_name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'product_rate'=>'required|numeric|between:0,5.0',
            'stock'=>'required',
            'weight'=>'required'
        ]);
        $product = new Product([
            'product_name' => $request->get('product_name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'product_rate' => $request->get('product_rate'),
            'stock' => $request->get('stock'),
            'weight' => $request->get('weight')
        ]);
        $product->save();
        return redirect('/products')->with('success', 'Product has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'product_name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'product_rate'=>'required|numeric|between:0,5.0',
            'stock'=>'required',
            'weight'=>'required'
        ]);

        $product = Product::find($id);
        $product->product_name = $request->get('product_name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->product_rate = $request->get('product_rate');
        $product->stock = $request->get('stock');
        $product->weight = $request->get('weight');
        $product->save();

        return redirect('/products')->with('success', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product has been deleted successfully');
    }
}
