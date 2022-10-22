<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- CSS FILES -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('css/templatemo-kind-heart-charity.css') }}" rel="stylesheet">



    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">



    </head>

    <body id="section_1">

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('images/logo.png') }}" class="logo img-fluid" alt="">
                <span>
                    Hayat
                    <small>Non-profit Organization</small>
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" {{ request()->is('/') ? 'active' : '' }} href="#top">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('projects*') ? 'active' : '' }}"
                            href="/projects">Projects</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('volunteer*') ? 'active' : '' }}"
                            href="#section_3">Volunteer</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" {{ request()->is('about*') ? 'active' : '' }} href="#section_4">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" {{ request()->is('contact*') ? 'active' : '' }}
                            href="#section_6">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        {{-- if user logged in --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle" href="#section_5" id="navbarLightDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"> <img
                                    src="{{ asset('img/' . auth()->user()->image) }}" class="img-fluid avatar-image"
                                    alt=""></a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="news.html">Profile</a></li>
                                <form method="post" action="/logout">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout
                                    </button>
                                </form>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="/login">Login</a>
                        </li>

                    @endauth
                </ul>
            </div>
        </nav>


    @yield('content')



    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4">
                    <img src="{{ asset('images/logo.png') }}" class="logo img-fluid" alt="">
                </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <h5 class="site-footer-title mb-3">Quick Links</h5>


                        <ul class="footer-menu">
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Our Story</a></li>


                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Home</a></li>
                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Login</a></li>
                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Projects</a></li>





                        @if (auth()->user())
                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Become a
                            volunteer</a></li>
                            @endif



                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Partner with us</a>
                            </li>
                        </ul>
                    </div>


                <div class="col-lg-4 col-md-6 col-12 mx-auto" style="padding-bottom:10px;">
                    <form class="custom-form subscribe-form" action="newsletterform" method="post" style="width: 400px; ">
                        @csrf
                        <h5 class="mb-4">Newsletter Form</h5>

                        <input type="email" name="email" id="subscribe-email" pattern="[^ @]*@[^ @]*"
                            class="form-control" placeholder="Email Address" required>
                            @error('email')
                            <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                          @enderror
                        <div class="col-lg-12 col-12">
                            <button type="submit" class="form-control">Subscribe</button>
                        </div>
                    </form>
        </div>


    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    {{-- <script src="{{asset('js/click-scroll.js') }}"></script> --}}
    <script src="{{ asset('js/counter.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
