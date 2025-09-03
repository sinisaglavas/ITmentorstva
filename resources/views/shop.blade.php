@extends('layout')

@section('title')
    Shop
@endsection

@section('sadrzajStranice')
    <p>Ovo je SHOP stranica</p>

    @foreach($products as $product)
        @if($product == 'Xiaomi 20+' || $product == 'Samsung Note 20+')
            <p>{{ $product }} - Samo danas popust 20%</p>
        @else
            <p>{{ $product }}</p>
        @endif
    @endforeach
@endsection
