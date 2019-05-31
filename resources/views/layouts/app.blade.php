<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/imgzoom.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
<div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Panel administratora</div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Opcje
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
        {{--<li class="nav-item">
            <a class="nav-link" href="{{ route('user_info.info') }}"
               data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user"></i>
                <span>Dane użytkownika</span>
            </a>
            --}}{{--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    --}}{{----}}{{--<h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="buttons.html">Buttons</a>
                    <a class="collapse-item" href="cards.html">Cards</a>--}}{{----}}{{--
                </div>
            </div>--}}{{--
        </li>--}}

        <!-- Nav Item - Utilities Collapse Menu -->
            {{-- <li class="nav-item">
                 <a class="nav-link collapsed" href="{{ route('photo.add') }}" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                     <i class="fas fa-fw fa-images"></i>
                     <span>Dodaj zdjęcia</span>
                 </a>
                 <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                      data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                         --}}{{--<h6 class="collapse-header">Custom Utilities:</h6>
                         <a class="collapse-item" href="utilities-color.html">Colors</a>
                         <a class="collapse-item" href="utilities-border.html">Borders</a>
                         <a class="collapse-item" href="utilities-animation.html">Animations</a>
                         <a class="collapse-item" href="utilities-other.html">Other</a>--}}{{--
                     </div>
                 </div>
             </li>--}}

            @if(auth()->user() && auth()->user()->admin==1)
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.index') }}" data-target="#collapseUtilities"
                       aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-user-circle"></i>
                        <span>Lista zgłoszeń</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{--<h6 class="collapse-header">Custom Utilities:</h6>
                            <a class="collapse-item" href="utilities-color.html">Colors</a>
                            <a class="collapse-item" href="utilities-border.html">Borders</a>
                            <a class="collapse-item" href="utilities-animation.html">Animations</a>
                            <a class="collapse-item" href="utilities-other.html">Other</a>--}}
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.ranking') }}" data-target="#collapseUtilities"
                       aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-sort-numeric-up"></i>
                        <span>Ranking</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{--<h6 class="collapse-header">Custom Utilities:</h6>
                            <a class="collapse-item" href="utilities-color.html">Colors</a>
                            <a class="collapse-item" href="utilities-border.html">Borders</a>
                            <a class="collapse-item" href="utilities-animation.html">Animations</a>
                            <a class="collapse-item" href="utilities-other.html">Other</a>--}}
                        </div>
                    </div>
                </li>
        @endif
        <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link " href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            </div>
                            </li>
                        @endguest
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; strona konkursowa 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    {{--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

    </main>--}}
</div>


<!-- Bootstrap core JavaScript-->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="{{ asset('js/zoomify.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


<script type="text/javascript">
    function showPhoto(id) {
        $('.showphoto').each(function () {
            $(this).hide();
        });
        $('#photo_' + id).toggle();
    }

    function closePhotos() {
        $('.showphoto').each(function () {
            $(this).hide();
        });
    }
</script>
<style>
    .showphoto {
        /** Position and style */
        position: fixed;
        z-index: 999;
        width: 100%;
        height: 100%;
        text-align: center;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.8);
    }

    .topcorner {
        position: absolute;
        top: 0;
        right: 0;
    }

    .photomax {
        max-width: 80%;
        max-height: 80%;
    }

    .topcorner:hover {
        cursor: pointer;
    }

    .zoom:hover {
        cursor: zoom-in;
    }

    .showphoto:hover {
        cursor: zoom-out;
    }
</style>
</body>
</html>
