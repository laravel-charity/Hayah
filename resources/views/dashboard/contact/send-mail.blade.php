@extends('layouts.master-admin')

@section('title','send message')

@section('breadcrumb','reply message')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>@yield('page', 'Send Email')</h5>
        </div>
        <div class="card-body">
            <form action="/admin/sendEmail" method="post" style="margin-left: 33%" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label>Email to: {{ $email }} </label>
                    <input type="hidden" name="email" class="form-control w-50" id="exampleInputPassword1"
                        placeholder="{{ $email }}" value="{{ $email }}">
                    <input type="hidden" name="id" class="form-control w-50" id="exampleInputPassword1"
                        placeholder="{{ $id }}" value="{{ $id }}">

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
