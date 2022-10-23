@extends('layouts.master-admin')


@section('content')
    
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>All {{ $volunteer->user->name }}'s projects</h5>
            
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Target donations</th>
                            <th>Starting date</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($volunteer->projects as $project)
                        <tr>
                            <td>{{++$i}}</td>
                            {{-- <td><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($project->image)) }}"                                " alt=""></td> --}}
                            <td>
                                <a href="/project/volunteers/{{ $project->id }}">
                                    {{ $project->name }}
                                </a>
                            </td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->target_donations}}</td>
                            <td>{{ Carbon\Carbon::parse($project->starting_date)->diffForHumans()}}</td>
                            <td>{{ $project->category->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection