<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images\logo.jpg') }}">

    <title>{{ config('app.name', 'Agency-Task') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js.map') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css.map') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}" style="overflow-x: hidden">
    <div class="d-flex">
        <div class="min-vh-100 col-12">
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images\logo.jpg') }}" class="col-6">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav col-0 col-md-4">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul
                                class="navbar-nav p-0 col-12 col-md-8 text-center d-flex flex-row justify-content-around justify-content-md-center align-items-start">

                                <!-- Authentication Links -->
                                @if (Auth::user() !== null)
                                    <div>
                                        <li class="nav-item dropdown">

                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="menu" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre>
                                                Options
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right text-center"
                                                aria-labelledby="navbarDropdown">
                                                @if(Auth::user()->user_type == 'is_admin')
                                                    <div class="text-center">
                                                        <a class="text-decoration-none nav-link"
                                                            href="{{ route('allProjects') }}">
                                                            All Projects
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <a class="text-decoration-none nav-link"
                                                            href="{{ route('allTasks') }}">
                                                            All Tasks
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="text-center">
                                                    <a class="text-decoration-none nav-link"
                                                        href="{{ route('myTasks') }}">
                                                        My Tasks
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                    <div>
                                        <li class="nav-item dropdown">
                                            <a class="text-decoration-none nav-link" v-pre
                                                href="{{ route('logout') }}">
                                                Logout
                                            </a>
                                        </li>
                                    </div>
                                @else
                                    <div>
                                        <li class="nav-item dropdown">
                                            <a class="text-decoration-none nav-link" v-pre
                                                href="{{ url('register') }}">
                                                Register
                                            </a>
                                        </li>
                                    </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <main class="my-4 min-vh-100">
                @yield('content')
            </main>
            <div class="bg-primary position-absolute bottom-0 col-12 footer">
                <div class="container">
                    <h6 class="text-center py-4 m-0">&copy; All Rights Reserved</h6>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('script')

</body>

</html>
