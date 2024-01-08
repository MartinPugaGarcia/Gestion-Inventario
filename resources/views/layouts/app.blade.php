<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- LINKS -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        var baseURL = {!! json_encode(url('/')) !!}
    </script>

</head>
<body class="imgHome">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <p class="text-center"><img src="{{asset('../resources/img/itsn.jpg')}}" width="45" height="60">
                    Gestión de Inventario y Prácticas
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
                            @if (Route::has('visitas.create'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('visitas.create') }}">{{ __('Visitas') }}</a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Registros</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/') }}" class="dropdown-item">Calendario</a></li>
                                <li><a href="{{route('prestamos.index')}}" class="dropdown-item">Préstamo Instrumentos</a></li>
                                <li><a href="{{route('materialeps.index')}}" class="dropdown-item">Préstamo Materiales</a></li>
                                <li><a href="{{route('visitas.index')}}" class="dropdown-item">Visitas</a></li>
                                <li><a href="{{route('reportes.index')}}" class="dropdown-item">Reporte de Incidencias</a></li>
                            </ul>
                        </li>

                        <a class="nav-link " href="{{route('reactivos.index')}}" >
                                    Reactivos
                        </a>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Manuales</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('reglamentos.index')}}" class="dropdown-item">Reglamentos</a></li>
                                <li><a href="{{route('procedimientos.index')}}" class="dropdown-item">Procedimientos</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Recursos</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('equipos.index')}}" class="dropdown-item">Equipos</a></li>
                                <li><a href="{{route('mobiliarios.index')}}" class="dropdown-item">Mobiliario</a></li>
                                <li><a href="{{route('materiales.index')}}" class="dropdown-item">Materiales</a></li>
                                <li><a href="{{route('instrumentos.index')}}" class="dropdown-item">Instrumentos</a></li>
                            </ul>
                        </li>

                        <a class="nav-link " href="{{route('proveedores.index')}}" >
                                    Proveedores
                        </a>

                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>



                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Scripts  -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @vite(['resources/js/inventario.js'])
        @vite(['resources/js/select-dinam.js'])
        @vite(['resources/js/bootstrap-clockpicker.js'])
        @vite(['resources/css/bootstrap-clockpicker.css'])

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<style type="text/css"> .imgHome { 
    background-image: url(../resources/img/fondo4.jpg);
    background-repeat: repeat;
    background-size: cover;
    background-color: #EEEEEE;
                            } 
</style>
