@extends('layouts.master')

@section('title', 'Log in')

@section('content')
    <div class="container">
        <form class="custom-form volunteer-form my-5 mb-lg-0  pb-0" action="users/authenticate" method="post" role="form">
            @csrf
            <h3 class="mb-5 text-center">Log In to Your Account</h3>

            <div class="row w-50 mx-auto mb-3 pt-2">

                <div class=" col-12">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control"
                        placeholder="Jackdoe@gmail.com">
                </div>

                @error('email')
                    <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
                @enderror

                <div class=" col-12">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                        value="{{ old('password') }}">
                </div>


                @error('password')
                    <p class="text-danger small" style="margin-top: -1.5rem">{{ $message }}</p>
                @enderror

                <div>
                    <input type="checkbox" value="true" id="flexCheckChecked" checked name="remember" />
                    <label class="form-check-label small" for="flexCheckChecked">Remember me</label>
                </div>
            </div>

            <button type="submit" class="form-control w-50 mx-auto">Log In</button>

        </form>
    </div>
    <div class="container text-center">
        <hr class="w-50 mx-auto">
        <form action="/redirect" method="get" class="custom-form volunteer-form mb-0 py-0">
            <button type="submit" class="form-control w-50 mx-auto">Continue With Google</button>
        </form>
        {{-- <a href="/redirect" class="custom-btn btn w-50 mx-auto"> Continue With Google</a> --}}
        <p class="my-3  text-center">Not a member? <a href="/register" class="text-decoration-underline">Sign Up</a></p>
    </div>
@endsection
