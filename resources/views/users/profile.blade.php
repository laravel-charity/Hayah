@extends('layouts.master')

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
                    <img width="300px"  style="object-fit:cover;height:300px" src="{{ asset('storage/' . $userData->image) }} "
                        class="ms-lg-auto bg-light shadow-lg img-fluid rounded-5" alt="">
                </div>

                <div class="col-lg-5 col-md-5 col-12 ">

                    <div class=" d-flex flex-column align-items-start justify-content-center pt-5 ">
                        <h2 style="text-transform: capitalize">{{ $userData->name }}</h2>

                        <p> <b> Email: </b> {{ $userData->email }}</p>
                        <p> <b> Donations: </b> {{ $donationCount }} </p>
                        <p> <b> Amount Donated: </b> {{ $donationAmount }} Jd</p>
                        @if ($userData->volunteer != null)
                            <p class="text-muted mb-lg-4 mb-md-4 ml-3"><b>City</b>:{{ $userData->volunteer->city }}</p>
                            <p class="text-muted mb-lg-4 mb-md-4 ml-3"><b>Phone</b>:{{ $userData->volunteer->phone }}</p>
                            @if($userData->volunteer->description )
                            <p class="text-muted mb-lg-4 mb-md-4 ml-3"><b>About</b>:{{ $userData->volunteer->description }}
                            </p>
                            @endif
                        @endif


                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-12 d-none d-md-block  ">
                    <h3 class="custom-text-block d-flex justify-content-end"> <a href="/editProfile"><i
                                class="bi bi-gear-fill "></i></a></h3>

                </div>

            </div>
            <hr class=" mt-5">
            {{-- Projects user volunteered in --}}
            <div class="container row  about-section section-padding text-center">
                <h2 class="custom-text " style="font-size:35px">Projects you volunteered in </h2>
                {{-- check if the use volunteer or not --}}
                @if ($volunteerProject->count() != 0)
                    <div class="text-center ">
                        <table class="table  mt-4 mx-auto" style="width:85%;">
                            <thead class="table-light">
                                <th>Project name</th>
                                <th>Starting date</th>
                                <th> Category</th>
                                <th> Volunteer Requset</th>
                                <th> Project Stutus</th>
                            </thead>
                            <tbody>

                                @foreach ($volunteerProject[0]->projects as $keyP => $project)
                                    <tr>
                                        <td class="text-muted">{{ $project->name }}</td>
                                        <td class="text-muted">{{ $project->starting_date }}</td>
                                        <td class="text-muted">{{ $project->category->name }}</td>
                                        <td class="text-muted">
                                            {{ $project->pivot->status }}
                                        </td>
                                        <td class="text-muted">{{ $project->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <span class="text-muted m-3 d-inline " style="font-size:20px">
                        You didn't volunteer in any project
                        </s><br>
                        <span><a href="/volunteer" class="custom-btn btn smoothscroll mt-3"> Become a Volunteer </a></span>
                @endif
            </div>
            <hr>
            {{-- Projects user donated in --}}
            <div class="container row  about-section section-padding text-center">
                <h2 class="custom-text " style="font-size:35px">Projects you donated in </h2>
                {{-- check if the user has donations or not --}}
                @if ($userData->donations->count() != 0)
                    <div class="text-center ">
                        <table class="table  mt-4 mx-auto" style="width:85%;">
                            <thead class="table-light">
                                <th>Project name</th>
                                <th>Donation Aumount </th>
                                <th> donation date</th>
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
                    <span class="text-muted m-3 d-inline " style="font-size:20px">
                        You didn't donate in any project
                    </span><br>
                    <span><a href="/donationto
                        " class="custom-btn btn smoothscroll "> Make Donation
                        </a></span>
                @endif
            </div>

        </div>
    </section>

@endsection
