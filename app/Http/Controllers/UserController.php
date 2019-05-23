<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function product()
    {
        return view('user.product');
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
