<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="stylesheet" href="/css/main.css">
    <!-- Styles -->
{{--     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 --}}
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
          <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


    <script src="/js/materialize.js"></script>
    <script src="/js/init.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/api.js"></script>
</head>
<body>
    <div id="app">
        <nav>
    <div class="nav-wrapper" style="background-color: #01579b;">
      <a href="{{url('/')}}" class="brand-logo">ITTG</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{ route('semesters.index') }}">Semestres</a></li>
        <li><a href="{{ route('references.create') }}">Referencias</a></li>
        <li><a href="{{route('subjects.index')}}">Materias</a></li>
        <li>
            <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
        </li>
      </ul>

    </div>
  </nav>
        <!--nav class="navbar navbar-default navbar-static-top">
            <div class="container">


                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <Left Side Of Navbar >
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>


                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        {{-- @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif --}}
                    </ul>
                </div>
            </div>
        </nav-->

        @yield('content')
    </div>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
