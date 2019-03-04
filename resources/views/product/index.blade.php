@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header">
                    Products
                </div>
                <div class="card-body">

                        <table class="table table-hover">

                                <thead>

                                    <th>

                                        Image

                                    </th>

                                    <th>

                                        Title

                                    </th>

                                    <th>

                                        Edit

                                    </th>

                                    <th>

                                        Trash

                                    </th>

                                </thead>

                                <tbody>


                                    @foreach ($products as $product)

                                    <tr>
                                        <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="90px" heigh="50px"></td>
                                        <td>{{ $product->name }}</td>
                                        <td><a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-info btn-sm">Edit</a></td>
                                        <td>
                                            <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="post">

                                                {{ csrf_field() }}

                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                        </form>
                                        </td>
                                    </tr>

                                    @endforeach


                                </tbody>

                            </table>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
