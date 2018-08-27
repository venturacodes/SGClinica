<header class="header">
    <a href="#" class="logo" data-toggle="collapse" data-target="#demo">
        SGClínica Menu
    </a>

        
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-right">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Entrar</a></li>
                    <li><a href="{{ route('register') }}">Registrar-se</a></li>
                @else
                <li >
            <a href="{{ route('appointment.show') }}">
                <i class="glyphicon glyphicon-calendar"></i> <span>Agenda</span>
            </a>
        </li>
        <li>
            <a href="{{ route('collaborator.index') }}">
                <i class="glyphicon glyphicon-user"></i> <span>Médicos</span>
            </a>
        </li>
        <li>
            <a href="{{ route('clinic.index') }}">
                <i class="glyphicon glyphicon-briefcase"></i> <span>Clínicas</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('client.index') }}">
                <i class="glyphicon glyphicon-heart"></i> <span>Pacientes</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('medicine.index') }}">
                <i class="glyphicon glyphicon-asterisk"></i> <span>Medicamentos</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('receipt.index') }}">
                <i class="glyphicon glyphicon-asterisk"></i> <span>Receitas</span>
            </a>
        </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->email }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
