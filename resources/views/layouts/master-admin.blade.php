<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
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
    <link rel="icon" href="images/logo.png" type="image/x-icon">

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
                        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i
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
                    
                    {{-- categories --}}

                    {{-- <li class="nav-item">
                        <a href="/admin/categories" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span
                                class="pcoded-mtext">All categories</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/categories/create" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">
                                Add category</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/trash/category')}}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-align-justify"></i></span><span class="pcoded-mtext">
                                Archive categories</span></a>
                    </li> --}}
                    {{-- end-categories --}}

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
                    {{-- <li class="nav-item">
                        <a href="/admin/projects" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span
                                class="pcoded-mtext">All projects</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/projects/create" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">
                                Add project</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/trash/project')}}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-align-justify"></i></span><span class="pcoded-mtext">
                                Archive projects</span></a>
                    </li> --}}
                    {{-- end-projects --}}

                    {{-- <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Projects</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/admin/projects">All projects</a></li>
                            <li><a href="/admin/projects/create">Add project</a></li>
                            <li><a href="{{url('/trash/project')}}">Archive projects</a></li>
                        </ul>
                    </li> --}}



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
                    {{-- <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Contact</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/contact/messages">All messages</a></li>
                        </ul>
                    </li> --}}


                    {{-- newsleeters --}}
                    {{-- <li class="nav-item pcoded-menu-caption">
                        <h5 class="text-primary"><label>Newsletters</label></h5>
                    </li>

                    <li class="nav-item">
                        <a href="/newsleeters" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span
                                class="pcoded-mtext">All subscribers</span></a>
                    </li> --}}
                    {{-- end-newsleeters --}}
                    {{-- <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Newsletters</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/newsleeters">All subscribers</a></li>
                        </ul>
                    </li> --}}

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
            {{-- <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="admin/images/logo.png" alt="" class="logo">
                <img src="admin/images/logo-icon.png" alt="" class="logo-thumb">
            </a> --}}
            <a class="b-brand" href="index.html">
                <span>
                    Hayat<br>
                    <small>Non-profit Organization</small>
                </span>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                {{-- <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="admin/images/user/avatar-1.jpg" class="img-radius"
                                    alt="User-Profile-Image">
                                <span>John Doe</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="user-profile.html" class="dropdown-item"><i
                                            class="feather icon-user"></i> Profile</a></li>
                                <li><a href="email_inbox.html" class="dropdown-item"><i
                                            class="feather icon-mail"></i> My Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i
                                            class="feather icon-lock"></i> Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li> --}}
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ asset('images/2.png') }}" class="img-radius" alt="User-Profile-Image">
                                <span>John Doe</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                {{-- <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li> --}}
                                <li>
                                        <form method="post" action="/logout">
                                            @csrf
                                            <button type="submit" class="dropdown-item ">
                                                <i class="feather icon-lock"></i>
                                                Logout
                                            </button>
                                        </form>
                                </li>
                                {{-- <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Logout</a></li> --}}
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
                                <li class="breadcrumb-item"><a href="#!">@yield('breadcrumb', 'Dashboard Analytics')</a></li>
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
    <script src="{{ asset('admin/js/pcoded.min.js"><') }}/script>

    <!-- Apex Chart -->
    <script src="{{ asset('admin/js/plugins/apexcharts.min.js') }}"></script>


    <!-- custom-chart js -->
    <script src="{{ asset('admin/js/pages/dashboard-main.js') }}"></script>
</body>

</html>
