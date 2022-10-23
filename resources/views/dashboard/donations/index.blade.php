@extends('layouts.master-admin')


@section('content')
    
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <h5>All donations</h5>
                </div>
                <div class="offset-md-4 col-md-4">
                    <form action="/donations">
                    <input type="text" class="form-control w-50 d-inline-block"
                     name="search" placeholder="Search">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 4px">Search</button>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Name</th>
                            <th>ُEmail</th>
                            <th>Project</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($donations as $donation)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $donation->amount }}</td>
                            <td>{{ $donation->name }}</td>
                            <td>{{ $donation->email }}</td>
                            <td>{{ $donation->project->name }}</td>
                            {{-- <td>
                                <form action="/admin/categories/{{ $donation->id }}" method="post" class="d-inline">
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