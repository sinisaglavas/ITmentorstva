@extends('layout')

@section('title')
    About Product
@endsection

@section('sadrzajStranice')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h3>{{ $product->name }}</h3>
                <h3>Cena: {{ $product->price }} RSD</h3>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center mt-2">
                <div class="card" style="width: 30rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
