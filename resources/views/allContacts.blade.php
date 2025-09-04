@extends('layout')

@section('title')
    All contacts
@endsection

@section('sadrzajStranice')
    <div class="container">
        <table class="table">
            <tr>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
            @foreach($allContacts as $contact)
                <tr>
                    <td>{{ $contact->email }}</td>
                    <td class="td">{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection
