@extends('layouts.master')

@section('title', 'Projects')
@section('content')

@if ($message ?? false)
<div class="alert alert-success text-center">
    {{ $message }}
</div>
@endif

<section class="section-padding">

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="col-12 ">
                    <form class="custom-form search-form" action="/projects" role="form">
                        <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search"
                            value="{{ @request('search') }}">

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
                        <span class="tags-block-link "> All </span>
                    </a>
                    <a href="?status=active">
                        <span
                            class="tags-block-link {{ request('status') == 'active' ? 'active-category text-white' : '' }}">
                            Active </span>
                    </a>
                    <a href="?status=in progress">
                        <span
                            class="tags-block-link {{ request('status') == 'in progress' ? 'active-category text-white' : '' }} ">
                            In progress </span>
                    </a>
                    <a href="?status=completed">
                        <span
                            class="tags-block-link {{ request('status') == 'completed' ? 'active-category text-white' : '' }}">
                            Completed </span>
                    </a>
                </div>

            </div>
            <div class="col-lg-9">
                <div class="row gy-5">
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

                                    <span class="badge
                                    {{-- set class  --}}
                                     @if ($project['status'] == 'completed') accomplished-project
                                     @elseif($project['status'] == 'in progress') in-progress-project text-dark
                                     @else  active-project @endif">

                                        {{-- set icon --}}
                                        {{ $project['status'] }}
                                        @if ($project['status'] == 'completed') <i class="bi bi-check-circle"></i>
                                        @elseif ($project['status'] == 'in progress')<i class="bi bi-clock-history"></i>
                                        @else <i class="bi bi-lightning-charge-fill"></i>
                                        @endif
                                    </span>
                                    <h5 class="mb-3">{{ $project['name'] }}</h5>
                                    <p>Starting date: {{ $project['starting_date'] }}</p>

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
                                            {{ $project->donations->sum('amount') }} Jd
                                        <p class="ms-auto mb-0">
                                            <strong>Goal:</strong>
                                            {{ $project['target_donations'] }} Jd
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex row">
                                    {{-- if project's status is completed or in progress --}}
                                    @if($project['status'] == 'completed' || $project['status'] == 'in progress')

                                    <a href="/project/{{ $project->id }}" class="custom-btn btn col w-100 "><small>View
                                            Details
                                        </small></a>
                                    {{-- if both volunteers and donations needed --}}
                                    @elseif($project['requirements']=='both')
                                    <a href="/donate/{{ $project->id }}" class="custom-btn btn col "
                                        style="border-right: 1px solid white"><small>Donate
                                        </small></a>
                                    <a href="/volunteerInProject/{{ $project->id }}"
                                        class="custom-btn btn col "><small>Volunteer</small></a>

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
                    @endforeach
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
