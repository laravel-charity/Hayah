@extends('layouts.master-admin')


@section('content')
    
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>All Volunteers</h5>
            
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
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($volunteers as $volunteer)
                        <tr>
                            <td>{{++$i}}</td>
                            {{-- <td><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($project->image)) }}"                                " alt=""></td> --}}
                            <td>
                                <a href="/volunteer/projects/{{ $volunteer->id }}">
                                    {{ $volunteer->user->name }}
                                </a>
                            </td>
                            <td>{{ $volunteer->phone }}</td>
                            <td>{{ $volunteer->city }}</td>
                            <td>{{ $volunteer->status }}</td>
                            <td>{{ $volunteer->description }}</td>
                            {{-- @if ($volunteer->status !== 'approve')
                            <td>
                                <a href="/admin/projects/{{ $volunteer->id }}/edit" class="btn  btn-primary d-inline">Approve</a>
                                
                            </td>
                            @endif --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection