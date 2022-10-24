@extends('layouts.master-admin')

@section('title','send subscribers')

@section('breadcrumb','send newsletter')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>@yield('page', 'Send Newsletter')</h5>
        </div>
        <div class="card-body">
            <form action="/admin/sendNewsletter" method="post" style="margin-left: 33%" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label>Create Newsletter to send to subscribers </label>
                </div>
                <div class="form-group">
                    <label>Email Body:</label>
                    <textarea name="emailbody" id="" class="form-control w-50" placeholder="emailbody" cols="30"
                        rows="10"></textarea>
                </div>


                <button type="submit" class="btn  btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
