@extends('layouts.master')

@section('title' , 'profile')

@section('content')

<div class="container">
    <form class="custom-form volunteer-form my-5 mb-lg-0 text-center" action="/update" method="post" role="form">
        @csrf
        <h3 class="mb-5">Edit Profile Infomation</h3>

        <div class="row w-50 mx-auto mb-3 pt-2">
            <div class=" col-12">
                <input type="text" name="name" id="name" class="form-control" required value="{{ $userData->name }}">
            </div>

            <div class=" col-12">
                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                    placeholder="Jackdoe@gmail.com" required  value="{{ $userData->email }}">
            </div>

            <div class=" col-12">
                <input type="file" name="image"  class="form-control"   value="{{ $userData->image }}>">
            </div>

        </div>

        <button type="submit" class="form-control w-25 mx-auto ">save</button>


    </form>
</div>

</section>

@endsection

