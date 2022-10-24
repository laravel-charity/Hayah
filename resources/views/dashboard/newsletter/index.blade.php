@extends('layouts.master-admin')

@section('title','subscribers')

@section('breadcrumb','subscribers')

@section('content')

@if (session()->has('message'))
<div class="alert alert-danger text-center">
    {{ session()->get('message') }}
</div>
@endif

<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>All subscribers</h5>
            
                <a href="/admin/sendNewsletterForm" class="btn  btn-primary d-inline float-right">Send Newsletter</a>
      
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($subscribers as $subscriber)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $subscriber->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection