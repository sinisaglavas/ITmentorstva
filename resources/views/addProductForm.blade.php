@extends('layout')

@section('title')
    Add Product
@endsection

@section('sadrzajStranice')

    <form action="{{ route('product.add') }}" method="post" class="m-3" enctype="multipart/form-data">
        @if($errors->any()) {{-- Ako postoji ikakva greska --}}
        <p class="text-danger">Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
        @endif

        @csrf
            <input type="text" name="name" placeholder="Unesite naziv proizvoda" value="{{ old('name') }}">
            <input type="number" min="0" name="amount" placeholder="Unesite kolicinu proizvoda" value="{{ old('amount') }}">
            <input type="number" step="0.1" min="0" name="price" placeholder="Unesite cenu proizvoda" value="{{ old('price') }}">
            <input type="file" name="image" value="{{ old('image') }}">
            <textarea name="description" placeholder="Unesite opis proizvoda"></textarea>
            <button>Posalji podatke</button>
    </form>
@endsection
