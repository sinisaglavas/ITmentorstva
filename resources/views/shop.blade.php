@extends('layout')

@section('title')
    Shop
@endsection

@section('sadrzajStranice')
    <div class="container">
        <p>Ovo je SHOP stranica</p>
        <table class="table table-primary">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Image</th>
                <th>O proizvodu</th>
            </tr>
            @foreach($allProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->image }}</td>
                    <td><a href="{{ route('product.permalink', ['product' => $product->id]) }}">Opis</a></td>
                </tr>
            @endforeach
        </table>
        <h3>Zadnjih 6 proizvoda:</h3>
        <table class="table table-secondary">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            @foreach($descProducts as $singleProduct)
                <tr>
                    <td>{{ $singleProduct->name }}</td>
                    <td>{{ $singleProduct->description }}</td>
                    <td>{{ $singleProduct->amount }}</td>
                    <td>{{ $singleProduct->price }}</td>
                    <td>{{ $singleProduct->image }}</td>
                </tr>
            @endforeach
        </table>

    </div>

@endsection
