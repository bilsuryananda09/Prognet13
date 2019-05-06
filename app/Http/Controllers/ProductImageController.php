<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImages;

class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productimages = ProductImages::all();

        return view('product_images.index', compact('productimages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product_images.create');
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
            'product_id'=>'required',
            'image_name'=>'required'
        ]);
        $productimage = new ProductImages([
            'product_id' => $request->get('product_id'),
            'image_name' => $request->get('image_name')
        ]);
        $productimage->save();
        return redirect('admin/productimages')->with('success', 'Product image has been added');
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
        $productimage = ProductImages::find($id);

        return view('product_images.edit', compact('productimage'));
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
            'product_id'=>'required',
            'image_name'=>'required',
        ]);

        $productimage = ProductImages::find($id);
        $productimage->product_id = $request->get('product_id');
        $productimage->image_name = $request->get('image_name');
        $productimage->save();

        return redirect('admin/productimages')->with('success', 'Product image category has been updated');
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
        $productimage = ProductImages::find($id);
        $productimage->delete();

        return redirect('admin/productimages')->with('success', 'Product image has been deleted successfully');
    }
}
