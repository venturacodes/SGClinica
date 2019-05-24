<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PUClinica</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/theme/iCheck/all.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{asset('css/theme/style.css')}}" /> --}}
    <link rel="stylesheet" href="{{asset('css/theme/fullcalendar.min.css')}}"  />
    <link href="{{asset('css/theme/fullcalendar.print.min.css')}}" rel="stylesheet" media="print" />
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/theme/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/dist/css/skins/skin-blue.min.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('calendar-css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
{{-- AUTH WIDGET --}}
    <header class="main-header">
        <a href="#" class="logo" data-toggle="collapse" data-target="#demo">
            <span class="logo-mini"><b>P</b>UC</span>
            <span class="logo-lg"><b>PUC</b>lnica</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                      </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav navbar-right" >
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Entrar</a></li>
                        <li><a href="{{ route('register') }}">Registrar-se</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>
{{-- FIM AUTH WIDGET --}}
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
                @if(isset(Auth::user()->image))
                  <img src="{{asset('storage/'.Auth::user()->image)}}" class="img-circle" alt="User Image">
                @else
                  <img src="{{asset('img/user.png')}}"class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
            <p>{{explode('@',Auth::user()->email)[0]}}</p>
              <!-- Status -->
            <p><strong>{{isset(Auth::user()->role) ? Auth::user()->role->name : ''}}</strong></p>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Minhas Ações</li>
            <!-- Optionally, you can add icons to the links -->
            @if(Auth::user()->role->level == 4)
              <li ><a href="{{ route('appointment.next_appointments') }}"><i class="fa fa-address-book" aria-hidden="true"></i> <span>Próximos agendamentos</span></a></li>
            @endcannot
            @if(Auth::user()->role->level > 1)
              <li ><a href="{{ route('appointment.agenda') }}"><i class="fa fa-calendar-alt" aria-hidden="true"></i> <span>Minha Agenda</span></a></li>
            @endcan
            @if(Auth::user()->role->level > 0)
              <li><a href="{{ route('client.index') }}"><i class="fa fa-users" aria-hidden="true"></i> <span>Meus pacientes</span></a></li>
            @endcan
            @if(in_array(Auth::user()->role->level,[4]))
              <li><a href="{{ route('collaborator.index') }}"><i class="fa fa-user-md" aria-hidden="true"></i> <span>Cadastro de funcionários</span></a></li>
            @endcan
            @if(Auth::user()->role->level > 2)
              <li><a href="{{ route('report.show') }}"><i class="fa fa-chart-bar" aria-hidden="true"></i> <span>Meus relatórios</span></a></li>
            @endcan
            @if(in_array(Auth::user()->role->level,[1,4]))
              <li><a href="{{ route('medicine.index') }}"><i class="fa fa-capsules" aria-hidden="true"></i><span>Medicamentos cadastrados</span></a></li>
            @endcan
            <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt" aria-hidden="true"></i><span>Sair</span> </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
            </li>
          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
<div class="content-wrapper" id="app">
  <section class="content container-fluid">
    @yield('content')
  </section>
 </div>
 <footer class="main-footer">
    <strong>Acadêmico: Arthur Alves Venturin </strong><a href="https://github.com/ArthurVenturin"><i class="fab fa-github-square" aria-hidden="true"></i>Github</a> 
</footer>
</div>

<!-- Scripts -->
<!-- jQuery UI 1.10.3 -->
<script src="{{asset('js/theme/jquery.min.js')}}"></script>
<script src="{{asset('js/theme/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{asset('js/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/theme/moment.min.js')}}" type="text/javascript"></script>
<!-- Director App -->
{{--  <script src="{{asset('js/theme/Director/app.js')}}" type="text/javascript"></script>
<script src="http://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>  --}}

<!-- Responsável pela internacionalização do calendário conforme: https://fullcalendar.io/docs/text/locale/ -->
 {{-- <script src="{{asset('js/theme/pt-br.js')}}" type="text/javascript"></script>  --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/theme/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/theme/locale/pt-br.js')}}"></script>
<script src="{{asset('js/theme/Chart.bundle.min.js')}}"></script>
<script src="{{URL::asset('js/adminlte/dist/js/adminlte.min.js') }}"></script>
@yield('calendar-js')
@yield('additional-js')
</body>
</html>
