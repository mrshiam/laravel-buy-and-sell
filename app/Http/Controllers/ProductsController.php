<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

    public function index(){
        $data['products'] = Product::all();
        return view('products',$data);
    }

    public function show($id){
        $product = Product::find($id);
        return view('product')->with('product', $product);
    }
    public function store(Request $request){
        //validate inputs
        $request->validate([
            'title'=> 'required',
            'desc-full'=> 'required',
            'desc-sm'=> 'required',
            'price'=> 'required|numeric',
            'img'=> 'required',
        ],[
            'title.required' => 'Please Enter Product Title',
            'desc-sm.required' => 'Please Enter Short Description',
            'desc-full.required' => 'Please Enter Full Description',
            'price.required' => 'Please Enter Product Price',
            'price.numeric' => 'Please Enter Numeric Value for price',
            'img.required' => 'Please Upload a Product Image',
        ]);

        //Upload the image
        $path = $request->file('img')->store('product_images');

        //Insert data into the product table
        $product = new Product();

        $product->title = $request->input('title');
        $product->short_desc = $request->input('desc-sm');
        $product->long_desc = $request->input('desc-full');
        $product->price = $request->input('price');
        $product->image_url = $path;
        $product->user_id=Auth::id();

        $product->save();

        return redirect()->route('/product/'.$product->id);
    }
}
