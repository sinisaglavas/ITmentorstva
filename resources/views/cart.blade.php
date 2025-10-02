@extends('layout')

@section('title')
    Cart
@endsection
@section('sadrzajStranice')
    <div class="container mt-5">
        <div class="row">
                <div class="d-flex justify-content-center mt-2">
                    @foreach($cart as $item)
                                <div class="card m-1" style="width: 30rem;">
                                    <img src="{{ $item['product_image'] }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item['product_name']}}</h5>
                                        <p class="card-text">{{ $item['product_description'] }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Količina: {{ $item['product_amount'] }}</li>
                                        <li class="list-group-item">Cena: {{ $item['product_price'] }}</li>
                                    </ul>
                                    <div class="card-footer">
                                        Ukupan iznos: {{ $item['product_amount'] * $item['product_price'] }}
                                    </div>
                                </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection

