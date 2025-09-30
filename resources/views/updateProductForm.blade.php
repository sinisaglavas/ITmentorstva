@extends('layout')

@section('title')
    Promena produkta
@endsection

@section('sadrzajStranice')
    <p>Ovo je stranica za promenu podataka odabranog PROIZVODA!</p>
    <div class="container mb-3">
        <div class="col-6">
            <form action="{{ route('product.update', ['product' => $product->id]) }}" method="post">
                @if($errors->any()) {{-- Ako postoji ikakva greska --}}
                <p class="text-danger">Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
                @endif
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Naziv proizvoda</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Unesite naziv proizvoda"
                           value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Kolicina</label>
                    <input type="number" id="amount" class="form-control" min="0" name="amount" placeholder="Unesite kolicinu proizvoda"
                           value="{{ $product->amount }}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Cena</label>
                    <input type="number" id="price" class="form-control" step="0.1" min="0" name="price" placeholder="Unesite cenu proizvoda"
                           value="{{ $product->price }}">
                </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Slika</label>
                        <input type="file" id="file" class="form-control" name="image" value="{{ $product->price }}">
                    </div>
                    <label for="description">Opis</label>
                    <textarea name="description" id="description" class="form-control mb-3" placeholder="Unesite opis proizvoda">
                        {{ $product->description }}
                    </textarea>
                    <button type="submit" class="btn btn-primary form-control">Potvrdi promene</button>
            </form>
        </div>
    </div>

@endsection

