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
    <link rel="stylesheet" href="{{asset('css/theme/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/theme/fullcalendar.min.css')}}"  />
    <link href="{{asset('css/theme/fullcalendar.print.min.css')}}" rel="stylesheet" media="print" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/adminlte/dist/css/skins/skin-blue.min.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('calendar-css')
</head>
<body class="skin-blue sidebar-mini">
@include('auth.authWidget')
<div id="app">
    <div class="wrapper row-offcanvas rowhold-transition-offcanvas-left">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </section>
    </div>

</div>

<!-- Scripts -->
<!-- jQuery UI 1.10.3 -->
<script src="{{asset('js/theme/jquery.min.js')}}"></script>
<script src="{{asset('js/theme/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap -->

<script src="{{asset('js/theme/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/theme/moment.min.js')}}" type="text/javascript"></script>
<!-- Director App -->
{{--  <script src="{{asset('js/theme/Director/app.js')}}" type="text/javascript"></script>
<script src="http://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>  --}}

<!-- Responsável pela internacionalização do calendário conforme: https://fullcalendar.io/docs/text/locale/ -->
{{--  <script src="{{asset('js/theme/pt-br.js')}}" type="text/javascript"></script>  --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/theme/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/theme/locale/pt-br.js')}}"></script>
<script src="{{asset('js/theme/Chart.bundle.min.js')}}"></script>
@yield('calendar-js')
@yield('additional-js')
</body>
</html>
