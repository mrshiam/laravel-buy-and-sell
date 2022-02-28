<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
        return view('cart');
    }

    public function addToCart($productId){
        $product = Product::findOrFail($productId);
        $cart = session('cart');
        $cart[$productId]['title'] = $product->title;
        $cart[$productId]['short_desc'] = $product->short_desc;
        $cart[$productId]['price'] = $product->price;
        $cart[$productId]['image'] = $product->image_url;
        session()->put('cart',$cart);

        return redirect()->back();
    }

    public function removeItem($productId){
        $cart = session('cart');
        unset($cart[$productId]);
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
