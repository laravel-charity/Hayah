@extends('layouts.master')

@section('title', 'Projects')
@section('content')

    @if ($message ?? false)
        <div class="alert alert-success text-center">
            {{ $message }}
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    <section class="section-padding">

        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="col-12 col-lg-8">
                        <form class="custom-form search-form" action="/projects" role="form">
                            <input class="form-control" type="search" name="search" placeholder="Search"
                                aria-label="Search" value="{{ @request('search') }}">

                            <button type="submit" class="form-control">
                                <i class="bi-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="tags-block mb-5 col-10">
                        <h5 class="mb-3">Categories</h5>
                        <a href="/projects" class="tags-block-link">
                            All
                        </a>
                        @foreach ($categories as $category)
                            <a href="/projects/{{ $category->id }}"
                                class="tags-block-link {{ request('filter') == $category->id ? 'active-category text-white' : '' }}">
                                {{ $category->name }}
                            </a>
                        @endforeach

                    </div>
                    <div class="tags-block mb-5 col-12">
                        <h5 class="mb-3">Status</h5>
                        <a href="?status">
                            <span class="badge"> All </span>
                        </a>
                        <a href="?status=active">
                            <span class="badge {{ request('status') == 'active' ? 'active-project' : '' }}">
                                Active </span>
                        </a>
                        <a href="?status=in progress">
                            <span
                                class="badge {{ request('status') == 'in progress' ? 'in-progress-project text-dark' : '' }} ">
                                In progress </span>
                        </a>
                        <a href="?status=completed">
                            <span class="badge {{ request('status') == 'completed' ? 'accomplished-project' : '' }}">
                                Completed </span>
                        </a>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="row g-2">
                        {{-- @if (request()->is('')) --}}
                        @foreach ($projects as $project)
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block-wrap">
                                    <a href="/project/{{ $project->id }}">
                                        <img src="data:image/png;base64,{{ chunk_split(base64_encode($project->image)) }}"
                                            class="custom-block-image img-fluid" alt="">
                                    </a>
                                    <div class="custom-block">
                                        <div class="custom-block-body">
                                            <span
                                                class="badge @if ($project['status'] == 'completed') accomplished-project
@elseif($project['status'] == 'in progress')
in-progress-project text-dark
@else
active-project @endif">{{ $project['status'] }}</span>
                                            <h5 class="mb-3">{{ $project['name'] }}</h5>
                                            <p>Starting project: {{ $project['starting_date'] }}</p>

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
                                        </div>

                                        <div class="d-flex">
                                            <a href="/donate/{{ $project->id }}"
                                                class="custom-btn btn @auth w-50 @else w-100 @endauth"><small>Donate
                                                </small></a>
                                            @auth
                                                <a href="/volunteerInProject/{{ $project->id }}"
                                                    class="custom-btn btn w-50"><small>Volunteer</small></a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
