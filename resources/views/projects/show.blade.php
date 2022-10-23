@extends('layouts.master')

@section('title', $project['name'])

@section('content')

<section class="news-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-12">
                <div class="news-block">
                    <div class="news-block-top">
                        <img src="data:image/png;base64,{{ chunk_split(base64_encode($project->image)) }}"
                            class="news-image img-fluid w-100" alt="">
                    </div>


                </div>
            </div>


            <div class="col-lg-5 col-12 mx-auto mt-4 mt-lg-0">
                <div class="news-block-info">
                    <div class="news-block-title mb-2 ">
                        <div class="d-flex">

                            <h6>
                                <h5>{{$project->name }}</h5>
                            </h6>
                        </div>

                        <div class="d-flex gap-2">
                            <p> Status: {{ $project['status'] }} </p>
                        </div>

                        <div class="d-flex gap-2">
                            <p>
                                Category:
                                <a href="/projects/{{ $project->category->id }}" class="text-dark fw-semibold">
                                    {{ $project->category->name }}
                                </a>
                            </p>
                        </div>

                        <div class="d-flex gap-2">
                            <p> Starting Date: <i class="bi-calendar4 custom-icon me-1"></i>
                                {{ $project->starting_date }}
                                </h6>
                            </p>
                        </div>

                        {{-- show donations only --}}
                        @if($project['requirements']=='donations')
                        <div class="d-flex gap-2">
                            <p> Collected donations:
                                {{ $project->donations->sum('amount') }} Jd
                                </h6>
                            </p>
                        </div>
                        @elseif($project['requirements']=='volunteers')
                        {{-- show volunteers only --}}
                        <div class="d-flex gap-2">
                            <p> Volunteers:
                                {{ $project->volunteers->count() }} person
                                </h6>
                            </p>
                        </div>
                        @else
                        {{-- show both --}}
                        <div class="d-flex gap-2">
                            <p> Volunteers:
                                {{ $project->volunteers->count() }} person
                                </h6>
                            </p>
                        </div>

                        <div class="d-flex gap-2">
                            <p> Collected donations:
                                {{ $project->donations->sum('amount') }} Jd
                                </h6>
                            </p>
                        </div>
                        @endif


                        <div class="news-block-body">
                            <h5 class="fs-5"> Description</h5>
                            <p class="fw-semibold"> {{ $project->description }}</p>
                        </div>
                    </div>

                    <div class="d-flex row align-items-center mt-4">
                        {{-- if project's status is completed or in progress --}}
                        @if($project['status'] == 'completed' || $project['status'] == 'in progress')
                        {{-- do nothing --}}

                        {{-- if both volunteers and donations needed --}}
                        @elseif($project['requirements']=='both')
                        <div class="row  ">
                            <div class="col-12 col-md-6 mb-2">
                                <a href="/donate/{{ $project->id }}" class="custom-btn btn w-100"
                                    style="border-right: 1px solid white"><small>Donate
                                    </small></a>
                            </div>

                            <div class="col-12 col-md-6 ">
                                <a href="/volunteerInProject/{{ $project->id }}"
                                    class="custom-btn btn w-100  "><small>Volunteer</small></a>
                            </div>
                        </div>



                        {{-- if only volunteers needed --}}
                        @elseif($project['requirements']=='volunteers')


                        <a href="/volunteerInProject/{{ $project->id }}"
                            class="custom-btn btn "><small>Volunteer</small></a>
                        {{-- if only donations needed --}}
                        @elseif($project['requirements']=='donations')
                        <a href="/donate/{{ $project->id }}" class="custom-btn btn  w-100 "><small>Donate
                            </small></a>
                        @endif


                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
