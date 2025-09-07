@extends('layout')

@section('title')
    All contacts
@endsection

@section('sadrzajStranice')
    <div class="container">
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
                        <a href="{{ route('deleteContact', [$contact->id]) }}" class="btn btn-danger">Delete</a>
                        <a href="" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection
