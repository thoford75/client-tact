<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TACT v2</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.css" />
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fooTable/css/footable.core.min.css') }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/pe-icon-7-stroke/css/helper.css') }}" />
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">



</head>
<body>
<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            TACT v2
        </span>
    </div>

    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">TACT v2</span>
        </div>

        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    @if (Auth::guest())
                        <li>
                            <a class="" href="{{ url('/login') }}">Login</a>
                        </li>
                    @else
                        <li>
                            <a class="" href="{{ url('/logout') }}">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="navbar-right">



            <ul class="nav navbar-nav no-borders">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>

                @else
                    <li><a href="#">{{ Auth::user()->name }}</a></li>


                    <li class="dropdown">
                        <a href="{{ url('/logout') }}">
                            <i class="pe-7s-upload pe-rotate-90"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>


<!-- Navigation -->
@if (Auth::check())
    <aside id="menu">
        <div id="navigation">
            <div class="profile-picture">
                <a href="#">
                    <img src="{{ asset('images/clients/'.  Auth::user()->name .'-profile.jpg') }}" class="img-circle m-b" alt="logo">
                </a>

                <div class="stats-label text-color">
                    <span class="font-extra-bold font-uppercase">{{ Auth::user()->name}}</span>

                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <small class="text-muted">{{ Auth::user()->jobrole }}<b class="caret"></b></small>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#">Contacts</a></li>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Analytics</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('logout') }}">Logout</a></li>
                        </ul>
                    </div>




                </div>
            </div>

            <ul class="nav" id="side-menu">
                <li {{ (Request::is('*board') ? 'class="active"' : '') }}>
                    <a href="jobs"> <span class="nav-label">Job Board</span> <span class="label label-success pull-right">{{ gmdate('M Y') }}</span> </a>
                </li>
                <li>
                    <a href="history"> <span class="nav-label">History</span></a>
                </li>


            </ul>
        </div>
    </aside>
@else
    <aside id="menu">
        <div id="navigation">
            <div class="profile-picture">
                <a href="#">
                    <img src="{{ asset('images/h2h-logo.jpg') }}" class="img-circle m-b" alt="logo">
                </a>

                <div class="stats-label text-color">
                    <span class="font-extra-bold font-uppercase">Guest</span>

                    <div class="dropdown">
                        <a class="dropdown-toggle" href="{{ url('login') }}">
                            <small class="text-muted">Please log in</small>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </aside>
    @endif
            <!-- Main Wrapper -->
    <div id="wrapper">

        <br>

        @yield('content')

                <!-- Footer-->
        <footer class="footer">
        <span class="pull-right">
            House to Home
        </span>
            Developed by <a href="mailto: tom@voguegroup.co.uk">Tom Ford</a> 2011 - {{ date('Y') }}
        </footer>

    </div>

    <!-- Vendor scripts -->
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendor/jquery-flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('vendor/jquery-flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendor/flot.curvedlines/curvedLines.js') }}"></script>
    <script src="{{ asset('vendor/jquery.flot.spline/index.js') }}"></script>
    <script src="{{ asset('vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('vendor/sparkline/index.js') }}"></script>
    <script src="{{ asset('vendor/fooTable/dist/footable.all.min.js') }}"></script>

    <!-- App scripts -->
    <script src="{{ asset('scripts/homer.js') }}"></script>
    <script>

        $(function () {

            // Initialize Example 1
            $('#sortableTable').footable();
            


        });

    </script>





</body>
</html>
