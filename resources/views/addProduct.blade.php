@extends('layout')

@section('title')
    Add Product
@endsection

@section('sadrzajStranice')

    <form action="/add-product" method="post" class="m-3" enctype="multipart/form-data">
        @if($errors->any()) {{-- Ako postoji ikakva greska --}}
        <p>Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
        @endif

        @csrf
            <input type="text" name="name" placeholder="Unesite naziv proizvoda">
            <input type="number" min="0" name="amount" placeholder="Unesite kolicinu proizvoda">
            <input type="number" step="0.1" min="0" name="price" placeholder="Unesite cenu proizvoda">
            <input type="file" name="image">
            <textarea name="description" placeholder="Unesite opis proizvoda"></textarea>
            <button>Posalji podatke</button>
    </form>
@endsection
