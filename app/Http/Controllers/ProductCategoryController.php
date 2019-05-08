<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategories;
use App\ProductCategoryDetails;

class ProductCategoryController extends Controller
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
        $productcategories = ProductCategories::all();

        return view('product_categories.index', compact('productcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product_categories.create');
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
            'category_name'=>'required|unique:product_categories'
        ]);
        $productcategory = new ProductCategories([
            'category_name' => $request->get('category_name')
        ]);
        $productcategory->save();
        return redirect('admin/productcategories')->with('success', 'Product category has been added');
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
        $productcategory = ProductCategories::find($id);

        return view('product_categories.edit', compact('productcategory'));
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
            'category_name'=>'required|unique:product_categories'
        ]);

        $productcategory = ProductCategories::find($id);
        $productcategory->category_name = $request->get('category_name');
        $productcategory->save();

        return redirect('admin/productcategories')->with('success', 'Product category has been updated');
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
        $productcategory = ProductCategories::find($id);

        $productcategorydetails = ProductCategoryDetails::where('category_id', $productcategory->id)->get();

        foreach ($productcategorydetails as $detail) {
            $detail->delete();
        }
        $productcategory->delete();

        return redirect('admin/productcategories')->with('success', 'Product category has been deleted successfully');
    }
}