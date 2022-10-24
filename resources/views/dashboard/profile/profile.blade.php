@extends('layouts.master-admin')

@section('content')

@section('title', 'profile')
{{-- {{ dd($userData->donations) }} --}}
@section('content')

{{-- calculate donatios amount and count --}}
<?php
    $donationCount = $userData->donations->count();
    $donationAmount = $userData->donations->sum('amount');
    ?>

<section class="about-section section-padding">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-start ">
            <div class="col-lg-4 col-md-4 col-12 text-center ">
                <img style="object-fit: cover ; height: 250px;" width="250px"
                    src="{{ asset('storage/' . $userData->image) }} "
                    class="ms-lg-auto bg-light shadow-lg img-fluid rounded-circle" alt="">
                <div>
                    <form action="updateAdminPhoto" method="POST" id="form" role="form" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" id="selectedFile" style="display: none;" />
                        <input type="button" class="btn  btn-outline-dark mt-3" value="Update Profile picture"
                            onclick="document.getElementById('selectedFile').click(); " />
                        <script>
                            document.getElementById("selectedFile").onchange = function() {
                                document.getElementById("form").submit();
                                };
                        </script>
                    </form>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-12 " style="border-left:1px rgb(162, 162, 162) solid; padding-left:4rem">

                <div class=" d-flex flex-column align-items-start justify-content-center pt-5 ">
                    <h2 style="text-transform: capitalize">{{ $userData->name }}</h2>
                    <h6> <b> Email: </b> {{ $userData->email }}</h6>
                    <h6> <b> Donations: </b> {{ $donationCount }} </h6>
                    <h6> <b> Amount: </b> {{ $donationAmount }} Jd</h6>
                    <h6> <b> Joined at: </b> {{ $userData->created_at->format('d-m-y') }}</h6>
                </div>

                <div class="col-lg-3 col-md-3 col-12 d-none d-md-block  ">
                    <h3 class="custom-text-block d-flex justify-content-end"> <a href="/editProfile"><i
                                class="bi bi-gear-fill "></i></a></h3>

                </div>

                <hr class=" mt-5">

                <div class="row">


                    {{-- Projects user volunteered in --}}
                    <div class="container">
                        <div class="row">
                            <div class="q col d-flex flex-column ">
                                @if ($userData->volunteer != null)
                                <h4>Volunteering Details</h4>
                                <h6><b>Attended Events</b> : {{ $volunteerProject->count() }}
                                </h6>
                                <h6><b>City</b> : {{
                                    $userData->volunteer->city }}
                                </h6>
                                <h6><b>Phone</b> : {{ $userData->volunteer->phone }}</h6>
                                <h6><b>About</b> : {{ $userData->volunteer->description }}
                                </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- update information --}}
        <hr class="my-5">
        <div class="row">
            <div class=" col-6  d-flex ">
                <form class="pr-5 w-100" style="border-right:1px solid gray" method="POST" action="/updateAdmin">
                    @csrf
                    {{-- name --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Your Name" value="{{$userData->name}}" name="name">
                    </div>
                    <span class="error text-danger">{{ $errors->first('name') }}</span>
                    {{-- email --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email" value="{{$userData->email}}" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <span class="error text-danger">{{ $errors->first('email') }}</span>

                    {{-- if volunteer --}}
                    @if($userData->volunteer != null)
                    {{-- city --}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">City</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="City"
                            value="{{$userData->volunteer->city}}" name="city">
                    </div>
                    <span class="error text-danger">{{ $errors->first('city') }}</span>
                    {{-- phone --}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone"
                            value="{{$userData->volunteer->phone}}" name="phone">
                    </div>
                    <span class="error text-danger">{{ $errors->first('phone') }}</span>
                    {{-- about --}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">About</label>
                        <textarea type="textarea" class="form-control" id="exampleInputPassword1"
                            placeholder="About You" name="description"> {{$userData->volunteer->description}}</textarea>
                    </div>
                    <span class="error text-danger">{{ $errors->first('description') }}</span>
                    @endif

                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>

            {{-- password form --}}

            <div class=" col-6  d-flex ">
                <form class=" w-100 pr-5    " action="/updatepass" method="post" role="form">
                    @csrf
                    {{-- old pass --}}
                    <div class="form-group">
                        <label for="password">Old Password</label>
                        <input type="password" name="password_current" id="password" class="form-control"
                            placeholder="current Password" value="{{ old('password_current') }}">
                        <span class="error text-danger">{{ $errors->first('password_current') }}</span>
                    </div>
                    {{-- new --}}
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" name="password_new" id="new_password" class="form-control"
                            placeholder="New Password" value="{{ old('password_new') }}">
                        <span class="error text-danger">{{ $errors->first('password_new') }}</span>
                    </div>

                    {{-- confirm --}}
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Confirm Your Password"
                            value="{{ old('password_confirmation') }}">
                    </div>
                    <span class="error text-danger">{{ $errors->first('password_confirmation') }}</span>

                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
        </div>




    </div>
</section>

@endsection
