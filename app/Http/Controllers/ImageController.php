<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        foreach ($images as $image)
        {
            echo $image->o_type." ____ ".$image->owner->name." ____ ".$image->path."<br/><br/>" ;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createImage");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if($request->o_type == 'user')
        //     $user = User::find($request->o_id);
        // if($request->o_type == 'product')
        //     $product = Product::find($request->o_id);
        Image::create($request->all());
        return "Image saved currectlly";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        echo $image->o_type." ____ ".$image->owner->name." ____ ".$image->path."<br/><br/>" ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view("createImage")->with(["image"=>$image]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $updatedImage = Image::find($image->id);
        $updatedImage->path = $request->path;
        $updatedImage->description = $request->description;
        $updatedImage->save();
        return "image updated successfully" ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image=Image::find($image->id);
        $image->delete();
        return "image deleted successfully" ;
    }
    public function createUserImage(Request $request)
    {
        $users = User::all();
        return view('createimage.createUserImage')->with(["users"=>$users]);
    }
    
    public function createProductImage(Request $request)
    {
        $products = Product::all();
        return view('createimage.createProductImage')->with(["products"=>$products]);
    }
}
