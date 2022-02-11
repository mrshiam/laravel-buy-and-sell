<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request){
        //validate inputs
        $request->validate([
            'title'=> 'required',
            'short_desc'=> 'required',
            'long_desc'=> 'required',
            'price'=> 'required|numeric',
            'img'=> 'required',
            'user_id'=> 'required',
        ],[
            'title.required' => 'Please Enter Product Title',
            'short_desc.required' => 'Please Enter Short Description',
            'long_desc.required' => 'Please Enter Full Description',
            'price.required' => 'Please Enter Product Price',
            'price.numeric' => 'Please Enter Numeric Value for price',
            'img.required' => 'Please Upload a Product Image',
            'user_id.required' => 'Please Enter User ID',
        ],[
            'short_desc' => 'Short Description',
            'long_desc' => 'Long Description',
            'img' => 'Product Image',
        ]);

        //Upload the image
        $path = $request->file('img')->store('product_images');
        dd($path);
        //Insert data into the product table
    }
}
