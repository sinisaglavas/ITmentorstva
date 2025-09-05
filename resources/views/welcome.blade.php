@extends('layout')

@section('title')
    Main
@endsection

@section('sadrzajStranice')

    @if($currentHour >= 0 && $currentHour <=12)
        <p>Dobro jutro</p>
    @else
        <p>Dobar dan</p>
    @endif
    <p>Ovo je GLAVNA stranica</p>

    <form action="/send-contact" method="post" class="m-3">
        @if($errors->any()) {{-- Ako postoji ikakva greska --}}
            <p>Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
        @endif

        @csrf
        <input type="email" name="email" placeholder="Unesite svoj email">
        <input type="text" name="subject" placeholder="Unesite naslov">
        <textarea name="description" placeholder="Unesite poruku"></textarea>
        <button>Posalji</button>
    </form>
@endsection
