<?php

namespace App\Http\Controllers;

use Cart;

use Mail;

use Session;

use Stripe\Stripe;

use Stripe\Charge;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){

        if(Cart::content()->count() == 0){

            Session::flash('info', 'your cart is still empty');

            return redirect()->back();

        }

        return view('checkout');

    }

    public function pay(){

        Stripe::setApiKey("sk_test_nqpqP2xMkL3FBXYeWf4MeHpb");

        $token = request()->stripeToken;

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Udemy Practice selling books',
            'source' => $token
        ]);

        Session::flash('success', 'Purchase successfull, wait for our email');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');

    }

}
