@extends('layout')

@section('title')
    Ocene
@endsection

@section('pageContent')
    <div class="container">
        <div class="col-6 m-4">
            <table class="table table-bordered">
                <tr>
                    <th>Predmet</th>
                    <th>Ocena</th>
                    <th>Profesor</th>
                </tr>
                @foreach($grades as $grade)
                    <tr>
                        <td>{{ $grade->predmet }}</td>
                        <td>{{ $grade->ocena }}</td>
                        <td>{{ $grade->profesor }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

@endsection
