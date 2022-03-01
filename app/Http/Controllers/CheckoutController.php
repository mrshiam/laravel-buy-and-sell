<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('checkout');
    }

    public function success(){
        return view('success');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'payment_type' => 'required'
        ]);

        $order = new Order();

        $order->order_id = '0-'.time();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email_address;
        $order->phone = $request->phone;
        $order->country = $request->country;
        $order->street_address = $request->street_address;
        $order->city = $request->city;
        $order->zip_code = $request->postal_code;
        $order->payment_type = $request->payment_type;
        $order->total_amount = 0;
        $order->save();

        foreach(session('cart') as $product_id => $cart){
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $product_id;
            $order_detail->quantity = 1;
            $order_detail->price = $cart['price'];
            $order_detail->sub_total = $cart['price'] * 1;
            $order_detail->save();
            $order->total_amount += $cart['price'] * 1;
        }
        $order->save();
        session()->remove('cart');
        return redirect()->route('order.success');
    }
}
