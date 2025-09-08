@extends('layout')

@section('title')
    Promena kontakta
@endsection

@section('sadrzajStranice')
    <p>Ovo je stranica za promenu podataka odabranog KONTAKTA!</p>
    <div class="container mb-3">
        <div class="col-6">
            <form action="{{ route('updateContact', ['contact' => $singleContact->id]) }}" method="post">
                @if($errors->any()) {{-- Ako postoji ikakva greska --}}
                <p class="text-danger">Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
                @endif
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           value="{{ $singleContact->email }}">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputSubject1" class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" id="exampleInputSubject1"
                           value="{{ $singleContact->subject }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputMessage1" class="form-label">Message</label>
                    <input type="text" name="message" class="form-control" id="exampleInputMessage1"
                           value="{{ $singleContact->message }}">
                </div>
                    <button type="submit" class="btn btn-primary form-control">Potvrdi promene</button>
            </form>
        </div>

    </div>

@endsection
