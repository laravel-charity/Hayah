@extends('layouts.master')

@section('title', 'Home')

@section('content')

<main>

    @section('content')

    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/slide/volunteer-helping-with-donation-box.jpg"
                                    class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>be a Kind Heart</h1>

                                    <p>No act of kindness, no matter how small, is ever wasted.</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="images/slide/volunteer-selecting-organizing-clothes-donations-charity.jpg"
                                    class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>Non-profit</h1>

                                    <p>Happiness doesn’t result from what we get, but what we give</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="images/slide/medium-shot-people-collecting-donations.jpg"
                                    class="carousel-image img-fluid" alt="...">

                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1>Humanity</h1>

                                    <p>Transforming the Healthcare Experience for Children</p>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h2 class="mb-5">Welcome to Hayat Charity</h2>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="/volunteer" class="d-block">
                            <img src="images/icons/hands.png" class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text">Become a <strong>volunteer</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="projects/{{$volunteerId}}" class="d-block">
                            <img src="images/icons/heart.png" class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text"><strong>Caring</strong> Earth</p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="/donationto" class="d-block">
                            <img src="images/icons/receive.png" class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text">Make a <strong>Donation</strong></p>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a href="projects/{{$scholarId}}" class="d-block">
                            <img src="images/icons/scholarship.png" class="featured-block-image img-fluid" alt="">

                            <p class="featured-block-text"><strong>Scholarship</strong> Program</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>


        </section>






    <section class="cta-section section-padding section-bg">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-lg-5 col-12 ms-auto">
                    <h2 class="mb-0">Make an impact. <br> Save lives.</h2>
                </div>


                <div class="col-lg-5 col-12">
                    <a href="/donationto" class="me-4">Make a donation</a>

                    <a href="/volunteer" class="custom-btn btn smoothscroll">Become a volunteer</a>
                </div>

            </div>
        </div>
    </section>

    {{-- Latest Events Section start --}}

    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Our Latest Events</h2>
                </div>
                @if (count($events) > 0)
                @foreach ($events as $event)
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <a href="/project/{{ $event->id }}">
                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($event->image)) }}"
                                class="custom-block-image img-fluid" alt="">
                        </a>
                        <div class="custom-block">
                            <div class="custom-block-body">

                                <h5 class="mb-3">{{ $event->name }}</h5>
                                <div class="project active-project text-white">
                                    {{ $event->status }} <i class="bi bi-lightning-charge-fill"></i>
                                </div>

                                <p>Starting date: {{ $event->starting_date }}</p>

                                {{-- calculate progress bar width --}}
                                <?php $width = ($event->donations->sum('amount') / $event->target_donations) * 100; ?>

                                <div class="progress mt-4">
                                    <div class="progress-bar" style="width: {{ $width }}% " role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">

                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-2">
                                    <p class="mb-0">
                                        <strong>Raised:</strong>
                                        {{ $event->donations->sum('amount') }} Jd
                                    </p>

                                    <p class="ms-auto mb-0">
                                        <strong>Goal:</strong>
                                        {{ $event->target_donations }} Jd
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex row">
                                {{-- if project's status is completed or in progress --}}
                                @if($event['status'] == 'completed' || $event['status'] == 'in progress')

                                <a href="/project/{{ $event->id }}" class="custom-btn btn col w-100 "><small>View
                                        Details
                                    </small></a>
                                {{-- if both volunteers and donations needed --}}
                                @elseif($event['requirements']=='both')
                                <a href="/donate/{{ $event->id }}" class="custom-btn btn col "
                                    style="border-right: 1px solid white"><small>Donate
                                    </small></a>
                                <a href="/volunteerInProject/{{ $event->id }}"
                                    class="custom-btn btn col "><small>Volunteer</small></a>

                                {{-- if only volunteers needed --}}
                                @elseif($event['requirements']=='volunteers')


                                <a href="/volunteerInProject/{{ $event->id }}"
                                    class="custom-btn btn "><small>Volunteer</small></a>
                                {{-- if only donations needed --}}
                                @elseif($event['requirements']=='donations')
                                <a href="/donate/{{ $event->id }}" class="custom-btn btn  w-100 "><small>Donate
                                    </small></a>
                                @endif

                            </div> {{-- <a href="donate/{{ $event->id }}" class="custom-btn btn">Donate now</a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-center">No events are currently Active </p>
                @endif

            </div>
        </div>
    </section>
    {{-- Latest Events Section end --}}

    {{-- in progress Events Section start --}}

    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Currently in progress Events</h2>
                </div>
                @if (count($in_progress) > 0)
                @foreach ($in_progress as $event)
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <a href="/project/{{ $event->id }}">
                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($event->image)) }}"
                                class="custom-block-image img-fluid" alt="">
                        </a>
                        <div class="custom-block">
                            <div class="custom-block-body">

                                <h5 class="mb-3">{{ $event->name }}</h5>
                                <div class="project in-progress-project">
                                    {{ $event->status }} <i class="bi bi-clock-history"></i>
                                </div>

                                <p>Starting date: {{ $event->starting_date }}</p>

                                {{-- calculate progress bar width --}}
                                <?php $width = ($event->donations->sum('amount') / $event->target_donations) * 100; ?>

                                <div class="progress mt-4">
                                    <div class="progress-bar" style="width: {{ $width }}% " role="progressbar"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center my-2">
                                    <p class="mb-0">
                                        <strong>Raised:</strong>
                                        {{ $event->donations->sum('amount') }} Jd
                                    </p>

                                    <p class="ms-auto mb-0">
                                        <strong>Goal:</strong>
                                        {{ $event->target_donations }} Jd
                                    </p>
                                </div>
                            </div>

                            <a href="project/{{ $event->id }}" class="custom-btn btn">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-center">No events are currently in progress </p>
                @endif


            </div>
        </div>
    </section>
    {{-- in progress Events Section end --}}



    <section class="testimonial-section section-padding section-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="mb-lg-3">What do they say?</h2>

                    <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="carousel-caption">
                                    <h4 class="carousel-title">What we have done for ourselves alone dies with us; what
                                        we have done for others and the world remains and is immortal</h4>

                                    <small class="carousel-name"><span class="carousel-name-title">Sara</span>,
                                        Boss</small>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <h4 class="carousel-title">Giving is not just about making a donation. It is about
                                        making a difference</h4>

                                    <small class="carousel-name"><span class="carousel-name-title">Ahmad</span>,
                                        Partner</small>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <h4 class="carousel-title">The work of volunteers impacts all our lives, even if we
                                        are not aware of it.</h4>

                                    <small class="carousel-name"><span class="carousel-name-title">Osama</span>,
                                        Volunteer</small>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="carousel-caption">
                                    <h4 class="carousel-title">As one person I cannot change the world, but I can
                                        change
                                        the world of one person</h4>

                                    <small class="carousel-name"><span class="carousel-name-title">Jafar</span>,
                                        Partner</small>
                                </div>
                            </div>

                            <ol class="carousel-indicators">
                                <li data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active">
                                    <img src="images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg"
                                        class="img-fluid rounded-circle avatar-image" alt="avatar">
                                </li>

                                <li data-bs-target="#testimonial-carousel" data-bs-slide-to="1" class="">
                                    <img src="/img/ahmad.jpg" class="img-fluid rounded-circle avatar-image"
                                        alt="avatar">
                                </li>

                                <li data-bs-target="#testimonial-carousel" data-bs-slide-to="2" class="">
                                    <img src="/img/osama.jpg" class="img-fluid rounded-circle avatar-image"
                                        alt="avatar">
                                </li>

                                <li data-bs-target="#testimonial-carousel" data-bs-slide-to="3" class="">
                                    <img src="/img/jafer.jpg" class="img-fluid rounded-circle avatar-image"
                                        alt="avatar">
                                </li>
                            </ol>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


</main>

@endsection
