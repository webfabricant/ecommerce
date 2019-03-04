<?php

namespace App\Http\Controllers;

use App\Product;

use Session;

use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/products/', $image_new_name);

        $p = [
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'uploads/products/'.$image_new_name,
            'description' => $request->description
        ];

        // dd($p);

        $r = Product::create($p);


        Session::flash('success', 'Product Added Successfully');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd('testing');
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $product = Product::find($id);

        // dd($request);

        if($request->hasFile('image')){

            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/products/', $image_new_name);

            $product->image = 'uploads/products/'.$image_new_name;

        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        Session::flash('success', 'Product updated successfully');

        // dd('testing');

        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(file_exists($product->image)){

            unlink($product->image);

        }

        $product->delete();

        Session::flash('success', 'Product has been deleted');

        return redirect()->back();
    }
}
