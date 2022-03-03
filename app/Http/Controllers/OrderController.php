<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request){
        $products = Product::where('user_id',Auth::id())->orderBy('created_at','DESC')->get();
        $append = [];
        $order = new Order();
        if($request->client_information != null){
            $order = $order->where(function ($query) use ($request){
                $query->where('first_name','like','%'.$request->client_information.'%')
                    ->orWhere('last_name','like','%'.$request->client_information.'%')
                    ->orWhere('phone','like','%'.$request->client_information.'%')
                    ->orWhere('email','like','%'.$request->client_information.'%');
            });
            $append['client_information']  = $request->client_information;
        }

        if($request->order_id != null){
            $order = $order->where('order_id','like','%'.$request->order_id.'%');
            $append['order_id']  = $request->order_id;
        }

        if($request->status != null){
            $order = $order->where('status',$request->status);
            $append['status']  = $request->status;
        }
        $order = $order->orderBy('id','desc')->paginate(1);
        $orders = $order->appends($append);
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
