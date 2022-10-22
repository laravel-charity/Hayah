@extends('layouts.master')

@section('title' , 'profile')

@section('content')

<div class="container">
    <form class="custom-form volunteer-form my-5 mb-lg-0 " action="/update" method="post" role="form">
        @csrf
        <h3 class="mb-5 text-center">Edit Profile Infomation</h3>

        <div class="row w-50 mx-auto mb-3 pt-2">
            <div class=" col-12">
                <label class="text-start fw-semibold " for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control text-dark" required
                    value="{{ $userData->name }}">
            </div>

            <div class=" col-12">
                <label class="text-start fw-semibold " for="email">Email</label>
                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                    placeholder="Jackdoe@gmail.com" required value="{{ $userData->email }}" disabled>
            </div>

            <label class="text-start fw-semibold " for="name">Profile photo</label>
            <div class=" col-12 d-flex align-items-end">
                <div class="me-5">
                    <img width="100px" src="img/{{ $userData->image }} ">
                </div>
                <input type="file" name="image" class="form-control" value="{{ $userData->image }}>">
            </div>

        </div>

        <button type="submit" class="form-control w-auto px-5 mx-auto ">save</button>


    </form>
</div>

</section>

@endsection
