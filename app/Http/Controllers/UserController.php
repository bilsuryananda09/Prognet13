<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImages;
use App\Product;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function product()
    {
        $product = Product::all();
        $image = ProductImages::all();
        return view('user.product', compact('image', 'product'));
    }

    public function productdetail($id)
    {
        $product = Product::find($id);
        $detail = Product::all();
        $image = ProductImages::where('product_id',$id)->get();

        return view('user.productdetail', compact('product', 'image', 'detail'));
    }

    public function about()
    {
        return view('user.about');
    }
}
