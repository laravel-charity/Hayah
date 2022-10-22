@extends('layouts.master')

@section('title', 'profile')
{{-- {{ dd($userData->donations) }} --}}
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <section class="about-section section-padding">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-lg-6 col-md-5 col-12 text-center ">
                    <img src="{{ asset('storage/' . $userData->image) }} "
                        class="ms-lg-auto bg-light shadow-lg img-fluid rounded-5" alt="">
                </div>

                <div class="col-lg-5 col-md-7 col-12 ">

                    <a class="custom-btn"style="font-size:17px;" href="/editProfile"><i class="bi bi-pencil-square"></i> Edit
                        Profile</a>
                    <a class="custom-btn"style="font-size:17px;" href="/changepass">Change password</a>
                    <div class="custom-text-block">
                        <h2 class="mb-0" style="text-transform: capitalize">{{ $userData->name }}</h2>
                        @if ($userData->volunteer != null)
                            <p class="text-muted mb-lg-4 mb-md-4 ml-3"><b>City</b>:{{ @$userData->volunteer->city }}</p>
                        @endif

                        <p> <b> Email</b> :{{ $userData->email }}</p>

                        <p> {{ @$userData->volunteer->description }}</p>

                    </div>
                </div>


            </div>

            {{-- Projects user volunteered in --}}
            <div class="container row  about-section section-padding text-center">
                <h2 class="custom-text "style="font-size:35px">Projects you volunteered in </h2>
                {{-- check if the use  volunteer or not --}}
                @if ($volunteerProject->count() != 0)
                    <div class="text-center ">
                        <table class="table  mt-4 mx-auto" style="width:85%;">
                            <thead class="table-light">
                                <th>Project name</th>
                                <th>Starting date</th>
                                <th> Category</th>
                                <th> Volunteer Requset</th>
                                <th> Project Status</th>
                            </thead>
                            <tbody>

                                @foreach ($volunteerProject[0]->projects as $keyP => $project)
                                    <tr>
                                        <td class="text-muted">{{ $project->name }}</td>
                                        <td class="text-muted">{{ $project->starting_date }}</td>
                                        <td class="text-muted">{{ $project->category->name }}</td>
                                        <td class="text-muted">
                                            {{-- @foreach ($volunteerProject as $keyV => $volunteer)
                                    @if ($keyV == $keyP)
                                    {{ $volunteer->status }}
                                    @endif
                                    @endforeach --}}
                                            {{ $project->pivot->status }}
                                        </td>
                                        <td class="text-muted">{{ $project->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <span class="text-muted m-3 d-inline "style="font-size:20px">
                        You didn't volunteer in any project
                        </s><br>
                        <span><a href="" class="custom-btn btn smoothscroll mt-3"> Become a Volunteer </a></span>
                @endif
            </div>
            <hr>
            {{-- Projects user donated in --}}
            <div class="container row  about-section section-padding text-center">
                <h2 class="custom-text "style="font-size:35px">Projects you donated in </h2>
                {{-- check if the user has donations or not --}}
                @if ($userData->donations->count() != 0)
                    <div class="text-center ">
                        <table class="table  mt-4 mx-auto" style="width:85%;">
                            <thead class="table-light">
                                <th>Project name</th>
                                <th>Donation Aumount </th>
                                <th>Donation date</th>
                            </thead>
                            <tbody>
                                @foreach ($userData->donations as $donations)
                                    <tr>
                                        <td class="text-muted">
                                            {{ $donations->project->name }}
                                        </td>
                                        <td class="text-muted">{{ $donations->amount }}</td>
                                        <td class="text-muted">{{ $donations->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <span class="text-muted m-3 d-inline "style="font-size:20px">
                        You didn't donate in any project
                    </span><br>
                    <span><a href="" class="custom-btn btn smoothscroll "> Make a Donation </a></span>
                @endif
            </div>

        </div>
    </section>

@endsection
