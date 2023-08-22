<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VIASAT - CRM 2.0.0') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Inter:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{secure_asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper -->
    {!! Html::script(secure_asset('assets/bootstrap/js/bootstrap.bundle.min.js')) !!}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- App CSS -->
    {!! Html::style(secure_asset('assets/css/app.css')) !!}
    {!! Html::style('assets/fonts/fontawesome.min.css') !!}

    @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'password.request')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="{{secure_asset('assets/css/sidebar.css')}}" rel="stylesheet">
    @endif
    @yield('header')
    @stack('header_style')
</head>

<body>
    <div id="app">
        @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'password.request')
        <nav class="top-bar">
            <button class="btn-toggle" id="toggle-sidebar"><i class="bi bi-list"></i></button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img alt="Viasat" title="Viasat" src="{{secure_asset('assets/img/logo-viasat-yellow.png')}}">
            </a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ UserHelper::nameUserHeader() }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <nav class="d-flex">
            <!-- Sidebar Mini -->
            <div class="sidebar sidebar-mini show-sidebar-mini" id="sidebar-mini">
                <ul class="nav flex-column">
                    <li class="nav-item mt-1">
                        <a class="nav-link " href="#" data-bs-toggle="sidebar-full" data-bs-target="#menu-1">
                            <span class="material-icons-outlined">space_dashboard</span>
                            <span>Clientes</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar sidebar-full show-sidebar-full" id="menu-1">
                <ul class="options-submenu">
                    <li>
                        <a class="" href="{{ route('show.register') }}">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg>
                            </i>
                            <span>Cadastro</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('show.consult') }}">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg>
                            </i>
                            <span>Consulta</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @endif
        <!-- content -->
        <main class="main-content {{str_contains(request()->route()->getName(),'.') ? 'shifted-full' : 'shifted' }}">
            @yield('content')
        </main>
    </div>
    <!-- Script App -->
    <script src="{{secure_asset('assets/js/app.js')}}"></script>
    @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'password.request')
    <script src="{{secure_asset('assets/js/sidebar.js')}}"></script>
    @endif
    @stack('scripts')
    @yield('scriptlogged')
</body>

</html>