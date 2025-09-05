@extends('layout')

@section('title')
    Shop
@endsection

@section('sadrzajStranice')
    <div class="container">
        <p>Ovo je ADMIN stranica za proizvode</p>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td class="td">{{ $product->description }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->image }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection

