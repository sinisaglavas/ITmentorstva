@extends('layout')

@section('title')
    All contacts
@endsection

@section('sadrzajStranice')
    <div class="container">
        <p>Svi KONTAKTI</p>
        <table class="table table-bordered">
            <tr class="text-center">
                <th>Email</th>
                <th>Subject</th>
                <th class="w-50">Message</th>
                <th>Actions</th>
            </tr>
            @foreach($allContacts as $contact)
                <tr>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <a href="{{ route('contact.delete', ['contact' => $contact->id]) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('contact.update', ['contact' => $contact->id]) }}" class="btn btn-primary">Edit</a>
                        @if(session()->has('message'))
                            <div class="alert alert-success p-0">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
