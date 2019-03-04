<?php

namespace App\Http\Controllers;

use Cart;

use App\Product;

use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart(){
        // dd(request()->all());

        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);

        //for image we will associate this $cartItem with Product model

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->route('cart');

    }

    public function cart(){

        // cart::destroy();
        return view('cart');

    }

    public function cart_delete($id){

        Cart::remove($id);

        return redirect()->back();

    }

    public function increase($id, $qty){

        Cart::update($id, $qty + 1);

        return redirect()->back();

    }

    public function reduce($id, $qty){

        Cart::update($id, $qty - 1);

        return redirect()->back();

    }

    public function rapid_add($id){

        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price
        ]);

        //for image we will associate this $cartItem with Product model

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->route('cart');

    }

}
