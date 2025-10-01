@extends('layout')

@section('title')
    Cart
@endsection

@section('sadrzajStranice')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-center mt-2">
                @foreach($cart as $product)
                    <div class="card" style="width: 30rem;">
                        <p>{{ $product['product_id'] }}</p>
                        <div class="card-body">
                            <p class="card-text">{{ $product['amount'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

