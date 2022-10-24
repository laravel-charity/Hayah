@extends('layouts.master-admin')

@section('title','projects')

@section('breadcrumb','projects')

@section('content')
    
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <h5>All projects</h5>
                </div>
    
                <div class="col-md-4">
                    <form action="/admin/projects" class="d-inline">
                    <input type="text" class="form-control w-75 d-inline-block"
                     name="search" placeholder="Search">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 4px">Search</button>
                    </form>
                </div>

                <div class="col-md-4">
                    <a href="{{url('/trash/project')}}" class="btn btn-warning float-right ml-2">Archive</a>
                    <a href="/admin/projects/create" class="btn btn-info float-right">Add new</a>
                </div>
            </div>
            
            
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>Name of project</th>
                            {{-- <th>Description</th> --}}
                            <th>status</th>
                            <th>target_donations</th>
                            <th>starting_date</th>
                            <th>category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{++$i}}</td>
                            <td><img class="wid-150 align-top m-r-15" src="data:image/png;base64,{{ chunk_split(base64_encode($project->image)) }}"                                " alt=""></td>
                            <td>
                                <a href="/project/volunteers/{{ $project->id }}">
                                    {{ $project->name }}
                                </a>
                            </td>
                            {{-- <td>{{ $project->description }}</td> --}}
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->target_donations }}</td>
                            <td>{{ $project->starting_date }}</td>
                            <td>{{ $project->category->name }}</td>
                            <td>
                                <a href="/admin/projects/{{ $project->id }}/edit" class="btn  btn-primary d-inline">Edit</a>
                                
                                <form action="/admin/projects/{{ $project->id }}" method="post" class="d-inline">
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