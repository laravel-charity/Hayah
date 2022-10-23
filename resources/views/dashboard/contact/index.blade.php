@extends('layouts.master-admin')


@section('content')
    
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>All Messages</h5>
            
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
                            {{-- <td>
                                <a href="/admin/categories/{{ $contact->id }}/edit" class="btn  btn-primary d-inline">Edit</a>
                                <form action="/admin/categories/{{ $contact->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection