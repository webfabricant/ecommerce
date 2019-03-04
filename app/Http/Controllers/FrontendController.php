<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('index', ['products'=> Product::paginate(3)]);
    }

    public function singleProduct($id){

        $product = Product::find($id);

        return view('single')->with('product', $product);

    }

}
