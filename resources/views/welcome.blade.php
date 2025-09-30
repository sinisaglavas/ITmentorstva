@extends('layout')

@section('title')
    Main
@endsection

@section('sadrzajStranice')
    <p>Ovo je GLAVNA stranica</p>
    <p>Vreme:{{ $currentTime }}</p>
    <form action="{{ route('contact.send') }}" method="post" class="m-3">
        @if($errors->any()) {{-- Ako postoji ikakva greska --}}
            <p>Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
        @endif
        @csrf
        <input type="email" name="email" placeholder="Unesite svoj email">
        <input type="text" name="subject" placeholder="Unesite naslov">
        <textarea name="message" placeholder="Unesite poruku"></textarea>
        <button>Posalji</button>
    </form>
@endsection
