@extends('layout')

@section('title')
    Shop
@endsection

@section('sadrzajStranice')
    <div class="container">
        <p>Ovo je ADMIN stranica za proizvode</p>
        <table class="table table-bordered">
            <tr class="text-center">
                <th>Name</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->image }}</td>
                    <td>
                        <a href="/admin/delete-products/{{ $product->id }}" class="btn btn-danger">Delete</a>
                        <a href="" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection

