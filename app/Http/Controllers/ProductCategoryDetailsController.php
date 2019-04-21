<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategoryDetails;
use App\ProductCategories;
use App\Product;

class ProductCategoryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcategorydetails = ProductCategoryDetails::all();
        $product = Product::get();
        $productcategories = ProductCategories::get();

        $detail = array();

        for ($i=0; $i < count($productcategorydetails); $i++)
        { 
            $id = $productcategorydetails[$i]->id;

            for ($j=0; $j < count($product) ; $j++) 
            { 
                if ($productcategorydetails[$i]->product_id == $product[$j]->id) 
                {
                    $product_name = $product[$j]->product_name;
                }    
            }

            for ($j=0; $j < count($productcategories) ; $j++) 
            { 
                if ($productcategorydetails[$i]->category_id == $productcategories[$j]->id) 
                {
                    $category_name = $productcategories[$j]->category_name;
                }    
            }

            $objek = (object) ["id"=>$id, "product_name"=>$product_name, "category_name"=>$category_name,];
            array_push($detail, $objek);
        }

        return view('product_category_details.index', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::get();
        $productcategories = ProductCategories::get();

        return view('product_category_details.create', compact("product", "productcategories"));
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
            'product_id'=>'required',
            'category_id'=>'required',
        ]);

        $productcategorydetails = new ProductCategoryDetails([
            'product_id' => $request->get('product_id'),
            'category_id' => $request->get('category_id'),
        ]);
        $productcategorydetails->save();

        return redirect('/productcategorydetails')->with('success', 'Product Category Details has been added');
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
    }
}
