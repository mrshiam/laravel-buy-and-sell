<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

    public function index(){
        $data['products'] = Product::orderBy('created_at','DESC')->paginate(12);
        return view('products',$data);
    }

    public function showOwnProducts()
    {
        $products = Product::where('user_id',Auth::id())->orderBy('created_at','DESC')->get();

        return view('dashboard')->with('products',$products);
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

        return redirect('/product/'.$product->id);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit_product')->with('product',$product);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=> 'required',
            'desc-full'=> 'required',
            'desc-sm'=> 'required',
            'price'=> 'required|numeric',
        ]);

        $product = Product::find($id);
        if($request->hasFile('img')){
            $path = $request->file('img')->store('product_images');
            $product->image_url = $path;
        }

        $product->title = $request->input('title');
        $product->short_desc = $request->input('desc-sm');
        $product->long_desc = $request->input('desc-full');
        $product->price = $request->input('price');
        $product->user_id=Auth::id();

        $product->save();
        return redirect('/product/'.$product->id);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('dashboard');
    }
}
