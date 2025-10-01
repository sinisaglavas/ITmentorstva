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
            <div class="d-flex justify-content-center mt-2">
                <form action="{{ route('cart.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <label for="amount" class="badge bg-secondary">Količina</label>
                    <input type="number" min="0" name="amount" class="form-control" id="amount">
                    <input type="submit" class="form-control mt-2">
                </form>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-2">
            <div class="col-5">
                @if(session()->has('message'))
                    <div class="alert alert-success text-center fw-bold fs-6">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
