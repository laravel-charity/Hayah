@extends('layouts.master-admin')


@section('content')
    
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>All projects</h5>
            
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>image</th>
                            <th>Name of project</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>target_donations</th>
                            <th>starting_date</th>
                            <th>category_id</th>
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
                            <td><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($project->image)) }}"                                " alt=""></td>
                            <td>
                                <a href="/project/volunteers/{{ $project->id }}">
                                    {{ $project->name }}
                                </a>
                            </td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->target_donations }}</td>
                            <td>{{ $project->starting_date }}</td>
                            <td>{{ $project->category_id }}</td>
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