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

    public function productdetail()
    {
        return view('user.productdetail');
    }

    public function about()
    {
        return view('user.about');
    }

    public function checkout()
    {
        return view('user.checkout');
    }
}
