@extends('layouts.app')

@section('content')

{{--  @if ($errors->any())
    {{ $errors }}
@endif  --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<div class="card card-default">
    <div class="card-header">
        Create a Product
    </div>

    <div class="card-body">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="Name">Price</label>
                <input type="text" name="price" class="form-control" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label for="Name">Photo</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="Name">Description</label>
                <textarea name="description" rows="10" class="form-control">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-success">Create Product</button>
            </div>
        </form>
    </div>
</div>

        </div>
    </div>
</div>

@endsection
