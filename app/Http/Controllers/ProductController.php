<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategories;
use App\ProductCategoryDetails;
use App\ProductImages;

class ProductController extends Controller
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
        $productcategories = ProductCategories::get();
        return view('products.create', compact("productcategories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required|unique:products',
            'price'=>'required',
            'stock'=>'required',
            'weight'=>'required',
            'categories'=>'required',
        ]);

        $product = new Product([
            'product_name' => $request->get('product_name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'product_rate' => 0,
            'stock' => $request->get('stock'),
            'weight' => $request->get('weight')
        ]);
        $product->save();

        foreach ($_POST['categories'] as $category) {
            $productcategory = new ProductCategoryDetails([
                'product_id' => $product->id,
                'category_id' => $category,
            ]); 
            $productcategory->save();
        }

        return redirect('/admin/products')->with('success', 'Product has been added');
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
        $singleProduct = Product::find($id);
        $product = Product::select('products.*')
            ->where("products.id", $id)
            ->join('product_category_details', 'product_category_details.product_id', '=', 'products.id')
            ->join("product_categories", "product_category_details.category_id", "=", "product_categories.id")
            ->select("products.*", "product_categories.id as category_id")
            ->get();
        $productcategories = ProductCategories::get();

        return view('products.edit', compact('product', 'singleProduct', 'productcategories'));
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
            'stock'=>'required',
            'weight'=>'required'
        ]);

        $product = Product::find($id);
        $product->product_name = $request->get('product_name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->stock = $request->get('stock');
        $product->weight = $request->get('weight');
        $product->save();

        return redirect('/admin/products')->with('success', 'Product has been updated');
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

        return redirect('/admin/products')->with('success', 'Product has been deleted successfully');
    }
}
