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

                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="{{ asset('admin/images/user/avatar-2.jpg') }}" alt="User-Profile-Image">
                        <div class="user-details">
                            <span>John Doe</span>
                            <div id="more-details">UX Designer<i class="fa fa-chevron-down m-l-5"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item"><a href="user-profile.html"><i
                                        class="feather icon-user m-r-5"></i>View Profile</a></li>
                            <li class="list-group-item"><a href="#!"><i
                                        class="feather icon-settings m-r-5"></i>Settings</a></li>
                            <li class="list-group-item"><a href="auth-normal-sign-in.html"><i
                                        class="feather icon-log-out m-r-5"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                   
                    <li class="nav-item">
                        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Users</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/admin/users">All users</a></li>
                            <li><a href="/admin/users/create">Add user</a></li>
                            <li><a href="/trash">Archive users</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Categories</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/admin/categories">All categories</a></li>
                            <li><a href="/admin/categories/create">Add category</a></li>
                            <li><a href="{{url('/trash/category')}}">Archive categories</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Projects</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/admin/projects">All projects</a></li>
                            <li><a href="/admin/projects/create">Add project</a></li>
                            <li><a href="{{url('/trash/project')}}">Archive projects</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Volunteers</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/volunteers">All volunteers</a></li>
                            {{-- <li><a href="/admin/projects/create">Add project</a></li>
                            <li><a href="{{url('/trash/project')}}">Archive projects</a></li> --}}
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Contact</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/contact/messages">All messages</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Newsletters</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/newsleeters">All subscribers</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="/#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Donations</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="/donations">All Donations</a></li>
                        </ul>
                    </li>


                    <li class="nav-item pcoded-menu-caption">
                        <label>Forms &amp; table</label>
                    </li>
                    <li class="nav-item">
                        <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">Forms</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Bootstrap
                                table</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Chart & Maps</label>
                    </li>
                    <li class="nav-item">
                        <a href="chart-apex.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-pie-chart"></i></span><span
                                class="pcoded-mtext">Chart</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="map-google.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Pages</label>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-lock"></i></span><span
                                class="pcoded-mtext">Authentication</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="auth-signup.html" target="_blank">Sign up</a></li>
                            <li><a href="auth-signin.html" target="_blank">Sign in</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="sample-page.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample
                                page</span></a></li>

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
                <img src="images/logo.png" class="logo img-fluid  w-md-25" alt="" style="width: 50px">
                <span>
                    Hayat<br>
                    <small>Non-profit Organization</small>
                </span>
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                            Dropdown
                        </a>
                        <div class="dropdown-menu profile-notification ">
                            <ul class="pro-body">
                                <li><a href="user-profile.html" class="dropdown-item"><i class="fas fa-circle"></i>
                                        Profile</a></li>
                                <li><a href="email_inbox.html" class="dropdown-item"><i class="fas fa-circle"></i> My
                                        Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="fas fa-circle"></i>
                                        Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown mega-menu">
                        <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                            Mega
                        </a>
                        <div class="dropdown-menu profile-notification ">
                            <div class="row no-gutters">
                                <div class="col">
                                    <h6 class="mega-title">UI Element</h6>
                                    <ul class="pro-body">
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Alert</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Button</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Badges</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Cards</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Modal</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i>
                                                Tabs & pills</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="mega-title">Forms</h6>
                                    <ul class="pro-body">
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i> Elements</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i> Validation</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i> Masking</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i> Wizard</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i> Picker</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-minus"></i> Select</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="mega-title">Application</h6>
                                    <ul class="pro-body">
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-mail"></i>
                                                Email</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-clipboard"></i> Task</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-check-square"></i> To-Do</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-image"></i> Gallery</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-help-circle"></i> Helpdesk</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="mega-title">Extension</h6>
                                    <ul class="pro-body">
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-file-plus"></i> Editor</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-file-minus"></i> Invoice</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-calendar"></i> Full calendar</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-upload-cloud"></i> File upload</a></li>
                                        <li><a href="#!" class="dropdown-item"><i
                                                    class="feather icon-scissors"></i> Image cropper</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="icon feather icon-bell"></i>
                            <span class="badge badge-pill badge-danger">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="#!" class="m-r-10">mark as read</a>
                                    <a href="#!">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="admin/images/user/avatar-1.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="admin/images/user/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="admin/images/user/avatar-1.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="admin/images/user/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="#!">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
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
    <script src="admin/js/vendor-all.min.js"></script>
    <script src="admin/js/plugins/bootstrap.min.js"></script>
    <script src="admin/js/pcoded.min.js"></script>

    <!-- Apex Chart -->
    <script src="admin/js/plugins/apexcharts.min.js"></script>


    <!-- custom-chart js -->
    <script src="admin/js/pages/dashboard-main.js"></script>
</body>

</html>
