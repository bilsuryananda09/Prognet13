<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategories;
use App\ProductCategoryDetails;
use App\ProductImages;
use Image;

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
        // $request->validate([
        //     'product_name'=>'required|unique:products',
        //     'price'=>'required',
        //     'stock'=>'required',
        //     'weight'=>'required',
        //     'categories'=>'required',
        // ]);

        // $product = new Product([
        //     'product_name' => $request->get('product_name'),
        //     'price' => $request->get('price'),
        //     'description' => $request->get('description'),
        //     'product_rate' => 0,
        //     'stock' => $request->get('stock'),
        //     'weight' => $request->get('weight'),
        //     'status' => 1,
        // ]);
        // $product->save();

        // foreach ($_POST['categories'] as $category) {
        //     $productcategory = new ProductCategoryDetails([
        //         'product_id' => $product->id,
        //         'category_id' => $category,
        //     ]); 
        //     $productcategory->save();
        // }

        
        if($request->hasFile('image'))
        {
            if($request->hasfile('image'))
            {
   
               foreach($request->file('image') as $file)
               {
                   $name=$file->getClientOriginalName();
                //    $file->move(public_path().'/files/', $name);  
                   $data[] = $name;  
               }
            }
   
            $file= new File();
            $file->filename=json_encode($data);

            return $file;
        //     foreach ($request->image as $file) {
        //         // $image = $file->file('image');
        //         $filename = time() . '.' . $file->getClientOriginalExtension();
        //         Image::make($file)->resize(300, 300)->save(public_path('/images/product/' . $filename));

        //         $productimage = new ProductImages([
        //             // 'product_id' => $product->id,
        //             'image_name' => $filename,
        //         ]);
        //         return $productimage;
        //         // $productimage->save();
        //     }
        }

        // return redirect('/admin/products')->with('success', 'Product has been added');
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
        $request->validate([
            'product_name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'stock'=>'required',
            'weight'=>'required',
            'categories'=>'required'
        ]);
        
        $category_details = ProductCategoryDetails::where("product_id", $id)->get();

        foreach($category_details as $category_detail){
            if(!in_array($category_detail->category_id, $request->categories)){
                ProductCategoryDetails::where("id", $category_detail->id)->delete();
            }
        }

        foreach ($request->categories as $category) {
            $category_detail = ProductCategoryDetails::where("product_id", $id)->where("category_id", $category)->first();

            if(!$category_detail){
                $item = new ProductCategoryDetails(
                    [
                        "product_id" => $id,
                        "category_id" => $category
                    ]
                );

                $item->save();
            }
        }

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
        $product->status = 0;
        $product->save();

        return redirect('/admin/products')->with('success', 'Product has been deleted successfully');
    }
}
