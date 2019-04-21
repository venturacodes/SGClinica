@extends('theme.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('status-alert'))
        <div class="alert alert-danger">
            {{ session('status-alert') }}
        </div>
    @endif
    @if (session('status-info'))
        <div class="alert alert-info">
            {{ session('status-info') }}
        </div>
    @endif
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
    <span class="navbar-brand" href="#">
       @yield('index_title')
    </span>
    </nav>
    <section class="panel">
        <header class="panel-heading">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
                @yield('index_search_button')
                @yield('index_add_button')
            </nav>
        </header>
        <div class="panel-body table-responsive">
            @yield('index_table_data')
        </div>
    </section>
@endsection
