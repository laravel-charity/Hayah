<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title','dashboard')</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">


    
</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    {{-- <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div> --}}
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">
                <ul class="nav pcoded-inner-navbar ">
                   
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                    {{-- users --}}
                    <li class="nav-item pcoded-menu-caption">
                        <a href="/admin/users" class="nav-link ">
                        <h5 class="text-primary">
                            <span class="pcoded-micon"><i
                                class="feather icon-align-justify"></i></span><span
                            class="pcoded-mtext">
                            Users
                        </span>
                        </h5></a>
                            <a href="/admin/categories" class="nav-link ">
                            <h5 class="text-primary">
                                <span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span
                                class="pcoded-mtext">
                                Categories
                            </span>
                            </h5></a>
                    </li>

                    {{-- end-users --}}
                    
                    {{-- projects --}}
                    <li class="nav-item pcoded-menu-caption">
                        <a href="/admin/projects" class="nav-link ">
                            <h5 class="text-primary">
                                <span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span
                                class="pcoded-mtext">
                                Projects
                            </span>
                            </h5></a>

                        <a href="/volunteers" class="nav-link ">
                            <h5 class="text-primary">
                                <span class="pcoded-micon"><i
                                    class="feather icon-user"></i></span><span
                                class="pcoded-mtext">
                                Volunteers
                            </span>
                            </h5></a>
                    </li>



                    {{-- messages --}}

                    <li class="nav-item pcoded-menu-caption">
                        <a href="/admin/messages" class="nav-link ">
                        <h5 class="text-primary">
                            <span class="pcoded-micon"><i
                                class="feather icon-mail"></i></span><span
                            class="pcoded-mtext">
                            Messages
                        </span>
                        </h5></a>
                            <a href="/newsleeters" class="nav-link ">
                            <h5 class="text-primary">
                                <span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">
                                Newsletters
                            </span>
                            </h5></a>
                    </li>

                    {{-- end-messages --}}


                    {{-- newsleeters --}}

                    {{-- donations --}}
                    <li class="nav-item pcoded-menu-caption">
                        <a href="/donations" class="nav-link ">
                            <h5 class="text-primary">
                                <span class="pcoded-micon"><i
                                    class="feather icon-map"></i></span><span
                                class="pcoded-mtext">
                                Donations
                            </span>
                        </h5></a>
                    </li>

                </ul>



            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">


        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a class="b-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" class="logo img-fluid" style="width: 50px" alt="">
                <span>
                    Hayat<br>
                    <small>Non-profit Organization</small>
                </span>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-radius" alt="User-Profile-Image">
                                <span>{{ auth()->user()->name }}</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="/dashboard/profile/{{ auth()->user()->id }}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li>
                                        <form method="post" action="/logout">
                                            @csrf
                                            <button type="submit" class="dropdown-item ">
                                                <i class="feather icon-lock"></i>
                                                Logout
                                            </button>
                                        </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>


    </header>
    <!-- [ Header ] end -->


    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">@yield('page-header', 'Dashboard ')</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard Analytics</a> / @yield('breadcrumb')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </div>



    <!-- Required Js -->
    <script src="{{ asset('admin/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/pcoded.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('admin/js/plugins/apexcharts.min.js') }}"></script>


    <!-- custom-chart js -->
    <script src="{{ asset('admin/js/pages/dashboard-main.js') }}"></script>
</body>

</html>
