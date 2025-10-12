@extends('layout')

@section('title')
    Main
@endsection

@section('sadrzajStranice')
    <div class="conteiner">
        <div class="row">
            <p class="text-center">Ovo je GLAVNA stranica</p><br>
            <p class="text-center">Vreme:{{ $currentTime }}</p>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center mt-2">
                <form action="{{ route('contact.send') }}" method="post" class="m-3">
                    @if($errors->any()) {{-- Ako postoji ikakva greska --}}
                    <p>Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
                    @endif
                    @csrf
                    <input class="form-control" type="email" name="email" placeholder="Unesite svoj email">
                    <input class="form-control mt-2 mb-2" type="text" name="subject" placeholder="Unesite naslov">
                    <textarea class="form-control" name="message" placeholder="Unesite poruku"></textarea>
                    <button class="form-control mt-3">Posalji</button>
                </form>
            </div>
        </div>
    </div>
@endsection
