@extends('layouts.master-admin')


@section('title','trash users')

@section('breadcrumb','trash users')

@section('content')
    
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Archive users</h5>
            
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="/restore/{{ $user->id }}" class="btn  btn-primary d-inline">Restore</a>
                                {{-- <form action="/force-delete/{{ $category->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Delete</button>
                                </form> --}}
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection