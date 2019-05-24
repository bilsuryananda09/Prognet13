<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carts;
use App\Product;
use App\ProductImages;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $products = Product::all();
        $user = Auth::id();
        $cart = Carts::select('carts.*')
        ->where('carts.user_id', $user)
        ->get();
        return view('user.checkout', compact('products', 'cart'));
    }

    public function cart(Request $request)
    {
        $product = Product::all();
        $image = ProductImages::all();
        $cart = Carts::all();
        $carts = $request->get('products');
            $cart = new Carts([
                'user_id' => $user = Auth::id(),
                'product_id' => $carts,
                'qty' => 1,
                'status' => 'notyet'
            ]);
            $cart->save();

        // if(isset($carts)) {
        //     $cart = Carts::find($carts);
        //     $cart->qty = +1;
        //     $cart->save();
        // }
        
        return redirect()->back()->with('success', 'Product has been added to Cart');
    }
}
