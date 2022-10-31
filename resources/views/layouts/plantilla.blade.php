<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap css cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Mapbox css cdn -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css' rel='stylesheet' />
    <!-- select2 css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('css')
    <!-- jquery cdn -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    
  
    <!-- sweet alert cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!-- Mapbox js cdn -->  
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js'></script>
    <!-- select2 js cdn -->  
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/"><i class="fa-solid fa-house"></i> {{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            @role('administrador')
                <a class="navbar-brand" href="/usuarios"><i class="fa-solid fa-users"></i> Gestion de usuarios</a>
            @endrole        
        </li>
        <li class="nav-item">
            @role('administrador|ejecutivo')
                <a class="navbar-brand" href="/asociados"><i class="fa-solid fa-people-group"></i> Gestion de asociados</a>
            @endrole        
        </li>
        <li class="nav-item">
            @role('administrador|junta_directiva')
                <a class="navbar-brand" href="/solicitudes"><i class="fa-solid fa-table-list"></i> Solicitudes</a>
            @endrole      
        </li>
        <!-- <li class="nav-item">
            @auth
                @if((Auth::user()->hasRole('asociado') || Auth::user()) && (!Auth::user()->hasRole('administrador|junta_directiva')))
                    <a class="navbar-brand" href="{{ route('solicitud.showUser', Auth::user()->id) }}"><i class="fa-solid fa-table-list"></i> Solicitudes</a>
                @endif
            @endauth
        </li> -->
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li> -->
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa-solid fa-circle-user fa-xl"></i> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @auth
                            @if((Auth::user()->hasRole('asociado') || Auth::user()) && (!Auth::user()->hasRole('administrador|junta_directiva')))
                                <a class="dropdown-item" href="{{ route('solicitud.showUser') }}"><i class="fa-solid fa-table-list"></i> Ver mi ultima solicitud</a>
                            @endif
                        @endauth
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
    </nav>
    <!-- Page content-->
    @yield('contenido')


    <script src="{{ asset('js/scripts2.js') }}"></script>
    @yield('scripts')    
</body>
</html>