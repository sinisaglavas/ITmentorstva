@extends('layout')

@section('title')
    Dodaj ocenu
@endsection

@section('pageContent')
    <div class="container">
        <div class="row">
            <div class="col-4 mb-4">
                <form action="{{ route('sendGrade') }}" method="post" class="m-3">
                    @if($errors->any()) {{-- Ako postoji ikakva greska --}}
                    <p>Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
                    @endif
                    @csrf
                        <div class="row">
                            <div class="col">
                                <label for="subject">Predmet
                                    <input required class="form-control mt-1" type="text" name="subject" placeholder="Unesite predmet">
                                </label>
                            </div>
                            <div class="col">
                                <label for="grade">Ocena
                                    <input required class="form-control mt-1" type="number" name="grade" placeholder="Unesite ocenu">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input required class="form-control mt-1" name="professor" placeholder="Ime i prezime profesora">
                            </div>
                        </div>
                        <button class="form-control mt-2">Posalji podatke</button>
                </form>
            </div>
        </div>


    </div>

@endsection
