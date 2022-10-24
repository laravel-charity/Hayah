@extends('layouts.master-admin')

@section('title','users')

@section('breadcrumb','users')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <h5>All users</h5>
                </div>
                        <div class="col-md-2">

                            <select name="role" class="form-control" onchange="location = this.value;">
                                <option>Role</option>
                                <option value="/filter/users/all" {{ request()->is("*/all") ? "selected" : "" }}>All</option>
                                <option value="/filter/users/user" {{ request()->is("*/user") ? "selected" : "" }}>
                                    User
                                </option>  
                                <option value="/filter/users/admin" {{ request()->is("*/admin") ? "selected" : "" }}>
                                  Admin
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <form action="/admin/users" class="d-inline">
                            <input type="text" class="form-control w-75 d-inline-block"
                             name="search" placeholder="Search">
                            <button type="submit" class="btn btn-primary" style="margin-bottom: 4px">Search</button>
                            </form>
                        </div>
                        
                        <div class="col-md-4">
                            <a href="/admin/users/create" class="btn btn-info mb-2">Add new</a>
                            <a href="/trash" class="btn btn-warning mb-2">Archive</a>
                        </div>
                    </div>
            
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $key => $user)
                        <tr>
                            {{-- <td>{{ ($users->currentpage()-1) * $users->perpage() + $key + 1 }}</td> --}}
                            <td>{{ $i++ }}</td>
                            <td><img src="{{ asset('img/' . $user->image) }} " style="width:80px" alt=""></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="/admin/users/{{ $user->id }}/edit" class="btn  btn-primary d-inline">Edit</a>
                                <form action="/admin/users/{{ $user->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger" onclick="return confirm('Are sure to delete')">Delete</button>
                                </form>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- {{ $users->links() }}  --}}
                </table>
            </div>
        </div>
    </div>
@endsection