@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            @if(config('adminlte.layout') == 'top-nav')
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand">
                            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            @else
            <!-- Logo -->
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>A</b>LT') !!}</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"> <img src=" {{ asset('images/logo.svg') }}" width="200px" alt="" class="img-responsive menu-logo" style="margin-top: 5px"></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                </a>
            @endif
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">

                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{Auth::user()->avatar}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">

                <p>
                    {{Auth::user()->name}}
                    @if(Auth::user()->isOnline())  
                  <p><i class="fa fa-circle text-success"></i> Online</p>
                  @endif
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                  <a href="{{ route('users.show', Auth::user()->id) }}" class="btn btn-default btn-flat">Perfil</a>
                
                
              </li>
            </ul>
          </li>
                        <li>
                            
                            @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                            @else
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                                <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                    @if(config('adminlte.logout_method'))
                                        {{ method_field(config('adminlte.logout_method')) }}
                                    @endif
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>
                @if(config('adminlte.layout') == 'top-nav')
                </div>
                @endif
            </nav>
        </header>

        @if(config('adminlte.layout') != 'top-nav')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-search text-blue"></i>
                            <span>Pesquisar</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <form action="{{ route('busca.cerveja') }}" method="POST" class="sidebar-form">
                                {{ csrf_field() }}
                                <div class="input-group">
                                  <input type="text" name="palavra" class="form-control" placeholder="Buscar Cerveja">
                                      <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                        </button>
                                      </span>
                                </div>
                            </form>
                              
                            <form action="{{ route('busca.user') }}" method="POST" class="sidebar-form">
                                {{ csrf_field() }}
                                <div class="input-group">
                                  <input type="text" name="palavra" class="form-control" placeholder="Buscar Usuário">
                                      <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                        </button>
                                      </span>
                                </div>
                            </form>

                            <li><a href="{{route('estilo.view')}}"><i class="fa fa-circle-o text-purple"></i> <span>Estilo</span></a></li>
                            <li><a href="{{route('cor.view')}}"><i class="fa fa-circle-o text-teal"></i> <span>Cor</span></a></li>
                            <li><a href="{{route('copo.view')}}"><i class="fa fa-circle-o text-green"></i> <span>Copo</span></a></li>
                        </ul>
                    </li>
                    @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')
                    @cannot('isMantenedor')
                    @if(!Auth::user()->isFabricante)
                        <li><a href="{{route('users.isFabricante', Auth::user()->id)}}" class="bg-green"><i class="fa fa-star"></i> <span>Alterar para conta de fabricante</span></a></li>
                        @else
                        <li><a href="{{route('users.isUser', Auth::user()->id)}}" class="bg-green"><i class="fa fa-star"></i> <span>Alterar para conta padrão</span></a></li>
                        @endif
                    @endcannot
                    <li><a href="{{route('users.edit',Auth::user()->id)}}"><i class="fa fa-gears"></i><span>configurações de conta</span></a></a></li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    <footer class="main-footer">
            <div class="pull-right hidden-xs">
            
            </div>
            <strong>Visite o GITHUB do projeto <a href="https://github.com/virtual-pub/Virtual-pub-web/" target="_blank">Virtual-Pub</a>.</strong>
          </footer>
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
    $('.select2').select2()
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()
    </script>
    @stack('js')
    @yield('js')
@stop
