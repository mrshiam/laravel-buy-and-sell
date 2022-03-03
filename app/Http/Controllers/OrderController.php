<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $products = Product::where('user_id',Auth::id())->orderBy('created_at','DESC')->get();
        $orders = Order::orderBy('id','desc')->paginate(12);
        return view('order_list')->with('products',$products)->with('orders',$orders);
    }

    public function show($id){
        $order = Order::with(['order_details' => function($query){
           return $query->with(['product']);
        }])->findOrFail($id);
        return view('order_show')->with('order',$order);
    }

    public function update($order_id,$order_status){
        $order = Order::findOrFail($order_id);
        $order->status = $order_status;
        $order->save();
        return redirect()->back();
    }
}
