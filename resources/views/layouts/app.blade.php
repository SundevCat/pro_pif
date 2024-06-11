<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/images/2022_PlanToys_logo.png') }}">
    <link rel="icon" type="image/jpg" sizes="16x16" href="{{ url('/images/2022_PlanToys_logo.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if( Session::has('success') || Session::has('danger') )
                            <div class="row"> 
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8 col-sm-offset-1">
                                    @if( Session::has('success') )
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ Session::pull('success') }}
                                        </div>
                                    @elseif(Session::has('danger'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ Session::pull('danger') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        @endif

                        @if(Session::has('message'))
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8 col-sm-offset-1">    
                                <div class="alert alert-block alert-dark">
                                    {{ Session::pull('message') }}
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
