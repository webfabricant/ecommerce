@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<div class="card card-default">
    <div class="card-header">
        Create a Product
    </div>
    <div class="card-body">
        <form action="{{ route('product.update', ['product'=>$product->id]) }}" method="post" enctype="multipart/form-data">

            {{ method_field('PATCH') }}

            {{ csrf_field() }}

            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="Name">Price</label>
                <input type="text" name="price" value="{{ $product->price }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="Name">Photo</label>
                <input type="file" name="image" value={{ $product->image }}class="form-control">
            </div>
            <div class="form-group">
                <label for="Name">Description</label>
                <textarea name="description" rows="10" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-success">Update Product</button>
            </div>
        </form>
    </div>
</div>

        </div>
    </div>
</div>

@endsection
