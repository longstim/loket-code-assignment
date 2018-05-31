<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Styles -->
    <!-- Bootstrap Core CSS -->
    {!! Html::style('asset/css/bootstrap.min.css') !!}

    <!-- Custom CSS -->
    {!! Html::style('asset/css/sb-admin.css') !!}

    <!-- Morris Charts CSS -->
    {!! Html::style('asset/css/plugins/morris.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('asset/font-awesome/css/font-awesome.min.css') !!}
    <!-- Scripts -->
    <style type="text/css">
         #header{
            font-family: arial;
            font-size: 15 px;
            background: #1f49a7;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #footer {
            width: 100%;
            bottom: 0px;
            padding-top: 30px;
            padding-bottom: 30px;
            color: #fff;
            background: #222;
        }
        
        #contentpage
        {

        }
     
    </style>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
         <header id="header">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color:#fff;">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" style="color:#fff;"><b>Login</b></a></li>
                        @else

                            <li> <a href="{{ url('/event') }}" style="color:#fff;"><b>EVENT</b></a>
                            </li>

                            <li> <a href="{{ url('/tiket') }}" style="color:#fff;"><b>TIKET</b></a>
                            </li>

                            <li> <a href="{{ url('/lokasi') }}" style="color:#fff;"><b>LOKASI</b></a>
                            </li>

                            <li class="dropdown">
                                <a href="#" style="color:#fff;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
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
                        @endif
                    </ul>
                </div>
            </div>
            </header>
        </nav>

        @yield('content')
    </div>

       <!-- Scripts -->

    <!-- jQuery -->
    {!! Html::script('asset/js/jquery.js') !!}

    <!-- jQuery UI-->
    {!! Html::script('asset/js/jquery-ui/jquery-ui.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('asset/js/bootstrap.min.js') !!}

    <!-- Bootstrap Filestyle JavaScript -->
    {!! Html::script('asset/js/bootstrap-filestyle.js') !!}

    <!-- Bootstrap Moment JavaScript -->
    {!! Html::script('asset/js/moment.js') !!}

    <!-- Morris Charts JavaScript -->
    {!! Html::script('asset/js/plugins/morris/raphael.min.js') !!}
    {!! Html::script('asset/js/plugins/morris/morris.min.js') !!}
    {!! Html::script('asset/js/plugins/morris/morris-data.js') !!}
</body>
</html>
