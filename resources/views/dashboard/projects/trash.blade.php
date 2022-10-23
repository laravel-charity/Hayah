@extends('layouts.master-admin')

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
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->target_donations }}</td>
                            <td>{{ $project->starting_date }}</td>
                            <td>{{ $project->category_id }}</td>
                            <td>
                                <a href="/restore/project/{{ $project->id }}" class="btn  btn-primary d-inline">restore</a>
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