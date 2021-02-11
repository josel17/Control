<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="shortcut icon" href="../images/square.ico" >
<head>



    <title>{{ config('app.name', 'title') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <!--Mystyle-->
    <link href="../vendor/easy/easy-autocomplete.themes.min.css" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css')}} ">

   @stack('styles')

    <!-- Bootstrap -->
  <link href="../vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->

    <!-- NProgress -->
    <link href="../vendor/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
  {{-- <link href="../vendor/iCheck/skins/flat/green.css" rel="stylesheet"> --}}
    <link href="../vendor/iCheck/skins/all.css" rel="stylesheet">
    <link href="../vendor/easy/easy-autocomplete.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="../vendor/font-awesome/css/font-awesome.min.css"> --}}


    <link href="../css/toastr.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">



  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 1;">

              <a href="{{route('home.index')}}" class="site_title"><i class="far fa-stop-circle"></i> <span>{{ config('app.name') }}App </span></a>
            </div>

            <div class="clearfix"></div>

            @include('partial.menu')

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" >
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>

              <a data-toggle="tooltip" data-placement="top" title="Logout"  href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                  <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                      <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="../images/img.jpg" alt="">{{ Auth::user()->persona->nombre }} <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  href="javascript:;"> Profile</a>

                          <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout').submit();">

                            <i class="fa fa-sign-out pull-right"></i>
                            {{ __('Log Out') }}
                          </a>
                          <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                    </li>

                    <!--SECCION PARA MENSAJES Y NOTIFICACIONES-->
                  </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
                @yield('content')
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            {{ config('app.name') }}App - 2020 Version 1.8.10
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="https://kit.fontawesome.com/367ecf7a9a.js" crossorigin="anonymous"></script>
    <script src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>


    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> --}}
    <script src="../vendor/jquery/dist/jquery.min.js"></script>


    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <!-- Bootstrap -->

    <!-- NProgress -->
    <script src="../vendor/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="../vendor/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->

    <script src="../js/toastr.min.js"></script>
    {{-- <script src="../vendor/jquery/dist/jquery.min.js"></script> --}}
    @stack('scripts')
     <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
     <script src="../build/js/custom.min.js"></script>
    <!-- Script select---- para cargar automaticamente el select departamentos-->
    <script src="../build/js/select.js" ></script>


    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}

    @yield('components')
    @include('partial.messages');

    <script>

      function baseUrl(url) {
        return '{{url('')}}/';

      }

    if(window.location.hash === '#create')
    {
      $('#modal_persona').modal('show');
    }

     $('#modal_persona').on('hide.bs.modal',function(){
        window.location.hash = '#';
     });

     $('#modal_persona').on('shown.bs.modal',function(){
        window.location.hash = '#create';
     });
    </script>
  </body>
</html>

