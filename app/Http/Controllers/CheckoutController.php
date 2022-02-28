<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('checkout');
    }

    public function store(Request $request){
        $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'email-address' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'street-address' => 'required',
            'city' => 'required',
            'postal-code' => 'required',
            'payment_type' => 'required'
        ]);
    }
}
