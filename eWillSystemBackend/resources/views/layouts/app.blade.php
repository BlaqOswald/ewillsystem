<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">

    <link href="{{ asset('assets\libs\toastr\toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\libs\sweetalert2\sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="{{ asset('assets\css\icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\css\app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet">
    <link href="{{ asset('assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\libs\switchery\switchery.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\libs\select2\select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\libs\datatables\dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\libs\datatables\buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\libs\datatables\responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\libs\datatables\select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

</head>

<body style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">

    <!-- Include SweetAlert Component -->

    @include('components.alert')
    <div id="wrapper">
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="nav-item dropdown notification-list">
                    <a
                        class="nav-link dropdown-toggle nav-user mr-0 waves-effect"
                        href="#"
                        id="userDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- Profile Link -->
                        <a class="dropdown-item notify-item" href="{{ url('/profile') }}">
                            <i class="mdi mdi-account"></i> <span>Profile</span>
                        </a>
                        <!-- Business Profile Link -->
                        <a class="dropdown-item notify-item" href="{{ url('/business') }}">
                            <i class="fas fa-briefcase"></i> <span>Business Profile</span>
                        </a>
                        <!-- Logout Link -->
                        <a
                            class="dropdown-item notify-item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            <i class="mdi mdi-logout-variant"></i> <span>Logout</span>
                        </a>
                        <!-- Logout Form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
            <!-- color: #fff;background:rgb(34, 43, 74) -->
            <div class="logo-box" style="color: #fff;background:linear-gradient(to bottom, rgb(141, 78, 158), rgb(34, 43, 74)99%)">
                <a href="{{ url('/') }}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/img/logo-edit.png') }}" alt="" height="55" class="text-bottom">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/img/logo-edit.png') }}" alt="" height="25" class="text-bottom">
                    </span>

                </a>
            </div>
            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li><button class="button-menu-mobile"><i class="mdi mdi-menu"></i></button></li>
                <li class="mt-4"><i class="far fa-calendar"></i> <?= date(
                    "l d F Y"
                ) ?> <i class="fas fa-clock"></i>
                    <span id="current_time"></span>
                </li>
            </ul>
        </div>

        <div class="left-side-menu" style="color: #fff;background:rgb(34, 43, 74)">

            <div id="sidebar-menu">
                <ul  id="side-menu">
                    <li><a class="text-white" href="{{ url('/') }}"> <i class="ion-md-apps"></i>
                            <span>Dashboard</span></a></li>
                    <li><a class="text-white" href="{{ url('/wills') }}"> <i class="fas fa-users"></i>
                            <span>Subscribers</span></a></li>
                    <li><a class="text-white" href="{{ url('/faqs') }}"> <i
                                class="mdi mdi-frequently-asked-questions"></i> <span>FAQ</span></a></li>
                    <li><a class="text-white" href="{{ url('/knowledgebases') }}"> <i class="fa fa-cubes"
                                aria-hidden="true"></i>
                            <span>Knowledgebase</span></a></li>
                    <li>
                        <a class="text-white" href="{{ url('/audit') }}">
                        <i class="ion-ios-list"></i>
                        <span>Audit Trail</span>
                        </a>
                    </li>

                    <li class="menu-item dropdown">
                        <a class="text-white" href="#" data-toggle="collapse" data-target="#settings-menu">
                            <i class="fa-solid fa-gear"></i><span class="menu-text">Settings</span>
                        </a>
                        <ul id="settings-menu" class="collapse">
                            <li><a class="dropdown-item text-white" href="{{ url('/options') }}">Field Settings</a></li>
                            <li><a class="dropdown-item text-white" href="{{ url('/packages') }}">Subscription Packages</a></li>
                            <li><a class="dropdown-item text-white" href="{{ url('/files') }}">Attachments</a></li>
                            <li><a class="dropdown-item text-white" href="{{ url('/admin/feedback') }}">User Feedback</a></li>
                            <li><a class="dropdown-item text-white" href="{{ url('/admins') }}">System Administrators</a></li>
                        </ul>
                    </li>
                    <!-- Hierarchy Dropdown -->
                    <li class="menu-item dropdown">
                        <a class="text-white" href="#" data-toggle="collapse" data-target="#hierarchy-menu">
                            <i class="fa fa-sitemap"></i><span class="menu-text">Hierarchy</span>
                        </a>
                        <ul id="hierarchy-menu" class="collapse">
                            <li><a class="dropdown-item text-white" href="{{ url('/roles') }}">Roles</a></li>
                            <li><a class="dropdown-item text-white" href="{{ url('/permissions') }}">Permissions</a></li>
                        </ul>
                    </li>
                    <li><a class="text-white" href="{{ url('/adverts') }}"> <i class="fas fa-bullhorn"></i>
                    <span>Adverts</span></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <style>
                #side-menu li a:hover,
                #side-menu li a:focus {
                    background-color: black; /* Black background on hover and focus */
                    color: white; /* Ensure text remains white */
                }

                /* Optional: Style for dropdown items */
                #side-menu .dropdown-item:hover,
                #side-menu .dropdown-item:focus {
                    background-color: black; /* Black background for dropdown items */
                    color: white; /* Ensure text remains white */
                }
            </style>
        </div>

        <main class="py-4 pl-0">
            @yield('content')
        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets\js\vendor.min.js') }}"></script>
<script src="{{ asset('assets\libs\jquery-sparkline\jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets\libs\moment\moment.min.js') }}"></script>
<script src="{{ asset('assets\libs\select2\select2.min.js') }}"></script>
<script src="{{ asset('assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets\libs\switchery\switchery.min.js') }}"></script>
<script src="{{ asset('assets\libs\jquery-scrollto\jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets\libs\jquery-mask-plugin\jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets\libs\sweetalert2\sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets\libs\datatables\jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets\libs\datatables\dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets\js\pages\datatables.init.js') }}"></script>
<script src="{{ asset('assets\libs\toastr\toastr.min.js') }}"></script>
<script src="{{ asset('assets\js\pages\toastr.init.js') }}"></script>
<script src="{{ asset('assets\js\app.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



<!-- Buttons for Excel, PDF, Print -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>


</html>

@yield('script')

<script>
    window.onload = function() {
        gettime();
    }

    function gettime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checktime(m);
        s = checktime(s);
        var b = document.getElementById('current_time').innerHTML = h + ":" + m + ":" + s;
        setTimeout(gettime, 1000);
    }

    function checktime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
</script>
