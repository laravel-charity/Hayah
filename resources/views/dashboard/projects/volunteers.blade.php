@extends('layouts.master-admin')

@section('title','volunteers')

@section('breadcrumb','volunteers')

@section('content')
    
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>All Volunteers for {{ $project->name }} program</h5>
            
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>phone</th>
                            <th>city</th>
                            <th>status</th>
                            <th>description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($project->volunteers as $volunteer)
                        <tr>
                            <td>{{++$i}}</td>
                            {{-- <td><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($project->image)) }}"                                " alt=""></td> --}}
                            <td>
                                <a href="/project/volunteers/{{ $volunteer->id }}">
                                    {{ $volunteer->user->name }}
                                </a>
                            </td>
                            <td>{{ $volunteer->phone }}</td>
                            <td>{{ $volunteer->city }}</td>
                            <td>{{ $volunteer->pivot->status }}</td>
                            <td>{{ $volunteer->description }}</td>
                            <td>
                                
                                @if ($volunteer->pivot->status == 'approved')
                                <form action="/status/volunteer" method="post" class="d-inline">
                                 @csrf
                                <input type="hidden" name="volunteer_id" value="{{ $volunteer->id }}">
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn  btn-danger d-inline">Reject</button>
                                </form>
                                @else
                                <form action="/status/volunteer" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="volunteer_id" value="{{ $volunteer->id }}">
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn  btn-primary d-inline">Approve</button>
                                </form>
                                @endif
                                
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