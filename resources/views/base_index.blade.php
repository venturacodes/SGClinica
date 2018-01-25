@extends('theme.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
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
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
                    <button class="btn btn-outline-success my-2 my-sm-0 btn-primary" type="submit">Buscar</button>
                    @yield('index_add_button')
                </form>

            </nav>
        </header>
        <div class="panel-body table-responsive">
            @yield('index_table_data')
        </div>
    </section>
@endsection
