@extends('layout')

@section('title')
    Contact
@endsection

@section('sadrzajStranice')
    <p>Ovo je CONTACT stranica</p>
    <div class="container mb-3">
        <div class="col-6">
            <form action="{{ route('sendContact') }}" method="post">
                @if($errors->any()) {{-- Ako postoji ikakva greska --}}
                <p class="text-danger">Greska: {{ $errors->first() }}</p> {{-- Ako postoji vise gresaka ispisi samo prvu gresku --}}
                @endif

                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           value="{{ old('email') }}">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputSubject1" class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" id="exampleInputSubject1"
                           value="{{ old('subject') }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputMessage1" class="form-label">Message</label>
                    <input type="text" name="message" class="form-control" id="exampleInputMessage1"
                           value="{{ old('message') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1082.8780089906504!2d19.84367959215524!3d45.255116957561775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475b106853463535%3A0x24a71c4d93fccdc3!2z0KHQv9C-0LzQtdC90LjQuiDQodCy0LXRgtC-0LfQsNGA0YMg0JzQuNC70LXRgtC40ZvRgw!5e0!3m2!1ssr!2srs!4v1756825571409!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

@endsection
