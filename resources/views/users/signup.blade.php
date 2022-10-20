@extends('layouts.master')

@section('title', 'Sign up')

@section('content')
    <div class="container">
        <form class="custom-form volunteer-form my-5 mb-lg-0 text-center" action="/users/store" method="post" role="form">
            @csrf
            <h3 class="mb-5">Register Today and Join Our Family</h3>

            <div class="row w-50 mx-auto mb-3 pt-2">
                <div class=" col-12">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Jack Doe" required>
                </div>

                <div class=" col-12">
                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                        placeholder="Jackdoe@gmail.com" required>
                </div>

                <div class=" col-12">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                        required>
                </div>


                <div class=" col-12">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        placeholder="Confirm Your Password" required>
                </div>

            </div>

            <button type="submit" class="form-control w-50 mx-auto">Sign Up</button>

            <p class="my-3">Already a member? <a href="">Log In</a></p>
        </form>
    </div>
@endsection
