@extends('layout')

@section('title')
    Cart
@endsection
@section('sadrzajStranice')
    <div class="container mt-5">
        <div class="row">
                <div class="d-flex justify-content-center mt-2">
                    @foreach($products as $product)
                        @foreach($cart as $cartItem) {{-- Petlja prolazi kroz korpu --}}
                            @if($product->id == $cartItem['product_id'])
                                <div class="card m-1" style="width: 30rem;">
                                    <img src="{{ $product->image }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Količina: {{ $cartItem['amount'] }}</li>
                                        <li class="list-group-item">Cena: {{ $product->price }}</li>
                                    </ul>
                                    <div class="card-footer">
                                        Ukupan iznos: {{ $cartItem['amount'] * $product->price }}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
@endsection

