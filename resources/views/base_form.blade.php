@extends('theme.app')
@section('content')
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">

            <span class="navbar-brand" href="#">
                <a href="javascript:history.back()" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
               <span>@yield('form_title')</span>
            </span>

    </nav>
    <section class="panel">
        <div class="panel-heading">

        </div>
        <div class="panel-body table-responsive">
            <div class="form-group">
                @include('form_status')
                @include('form_errors')
                @yield('form_content')
            </div>
        </div>
        </div>
    </section>
@endsection
