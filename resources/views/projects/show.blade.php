@extends('layouts.master')

@section('title', $project['name'])

@section('content')

    <section class="news-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-12">
                    <div class="news-block">
                        <div class="news-block-top">
                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($project->image)) }}"
                                class="news-image img-fluid" alt="">

                            <div class="news-category-block text-white">
                                Category:
                                <a href="/projects/{{ $project->category->id }}" class="category-block-link">
                                    {{ $project->category->name }}
                                </a>
                            </div>
                        </div>


                    </div>
                </div>


                <div class="col-lg-4 col-12 mx-auto mt-4 mt-lg-0">
                    <div class="news-block-info">

                        <div class="news-block-title mb-2">
                            <h4> {{ $project->name }}</h4>
                            <span class="badge">{{ $project['status'] }}</span>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="news-block-date">
                                <p>
                                    <i class="bi-calendar4 custom-icon me-1"></i>
                                    {{ $project->starting_date }}
                                </p>
                            </div>

                        </div>

                        <div class="news-block-body">
                            <p> {{ $project->description }}</p>
                        </div>


                        <div class="progress mt-4">

                            <div class="progress-bar" role="progressbar"
                                aria-valuenow="{{ ($project->donations->sum('amount') / $project['target_donations']) * 100 }}"
                                aria-valuemin="0" aria-valuemax="100"
                                style="width:{{ ($project->donations->sum('amount') / $project['target_donations']) * 100 }}%">
                            </div>
                        </div>

                        <div class="d-flex align-items-center my-2">
                            <p class="mb-0">
                                <strong>Raised:</strong>
                                {{ $project->donations->sum('amount') }} JOD
                            <p class="ms-auto mb-0">
                                <strong>Goal:</strong>
                                {{ $project['target_donations'] }} JOD
                            </p>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <a href="/donate/{{ $project->id }}"
                                class="custom-btn btn @auth w-50 @else w-100 @endauth">Donate
                                now</a>
                            @auth
                                <a href="/volunteerInProject/{{ $project->id }}" class="custom-btn btn w-50">Volunteer</a>
                            @endauth
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
