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

    <p>Trenutno sati: {{ $currentHour }}</p>
    <p>Trenutno vreme: {{ $currentTime }}</p>
    <p>Ovo je GLAVNA stranica</p>
@endsection
