<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        foreach ($products as $product)
        {
            echo $product->name." : ".$product->units->name."<br/><br/>" ;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        return view("createProduct")->with(["units"=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return "product saved currectlly";
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {
        echo $product->name." : total quantity is ".$product->total_quantity." ".$product->units->name."<br/><br/>" ;
        echo " image path is ".$product->image_path ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $units = Unit::all();
        $productImage = Image::where('o_id',$product->id)->where('o_type',"product")->first();
        return view("createProduct")->with(["product"=>$product,"units"=>$units ,"productImage"=>$productImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $updatedProduct = Product::find($product->id);
        $updatedProduct->name = $request->name;
        $updatedProduct->unit_id = $request->unit_id;
        $updatedProduct->save();
        $imageUpdater = new ImageController ;
        $image = Image::find($request->imageId);
        if ($image) {
            $imageUpdater->update($request,$image);
        }
        return "product updated successfully" ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product=Product::find($product->id);
        $product->delete();
        $productImage = Image::where('o_id',$product->id)->where('o_type',"product")->first();
        if ($productImage) {
            $productImage->delete();
        }
        return "product deleted successfully" ;
    }
}
