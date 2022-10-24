@extends('layouts.master-admin')


@section('content')
  
@section('breadcrumb','categories')

@section('title','categories')

<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>All categories</h5>
            <a href="{{url('/trash/category')}}" class="btn btn-warning float-right ml-2">Archive</a>
            <a href="/admin/categories/create" class="btn btn-info float-right">Add new</a>
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
                        @foreach ($categories as $category)
                        <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="/admin/categories/{{ $category->id }}/edit" class="btn  btn-primary d-inline">Edit</a>
                                    <form action="/admin/categories/{{ $category->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger" onclick="return confirm('Are sure to delete')">Delete</button>
                                    </form>
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