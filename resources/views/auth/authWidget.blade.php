<header class="header">
    <a href="#" class="logo" data-toggle="collapse" data-target="#demo">
        SGClínica
    </a>
    <nav class="navbar navbar-static-top" role="navigation" style="background-color: #448DBA;">
        <div class="navbar-right">
            <ul class="nav navbar-nav navbar-right" style="background-color: #448DBA;">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Entrar</a></li>
                    <li><a href="{{ route('register') }}">Registrar-se</a></li>
                @else

        <li style="background-color: #448DBA;">
            <a href="{{ route('appointment.next_appointments') }}">
                <i class="glyphicon glyphicon-calendar"></i> <span>Próximos agendamentos</span>
            </a>
        </li>        
        <li style="background-color: #448DBA;">
            <a href="{{ route('report.show') }}">
                <i class="glyphicon glyphicon-dashboard"></i> <span>Relatórios</span>
            </a>
        </li>
        <li style="background-color: #448DBA;">
            <a href="{{ route('appointment.show') }}">
                <i class="glyphicon glyphicon-calendar"></i> <span>Agenda</span>
            </a>
        </li>
        <li style="background-color: #448DBA;">
            <a href="{{ route('collaborator.index') }}">
                <i class="glyphicon glyphicon-user"></i> <span>Médicos</span>
            </a>
        </li >
        <li style="background-color: #448DBA;">
            <a href="{{ route('clinic.index') }}">
                <i class="glyphicon glyphicon-briefcase"></i> <span>Clínicas</span>
            </a>
        </li >
        <li style="background-color: #448DBA;">
            <a  href="{{ route('client.index') }}">
                <i class="glyphicon glyphicon-heart"></i> <span>Pacientes</span>
            </a>
        </li>
        <li style="background-color: #448DBA;">
            <a  href="{{ route('medicine.index') }}">
                <i class="glyphicon glyphicon-asterisk"></i> <span>Medicamentos</span>
            </a>
        </li>
        <li style="background-color: #448DBA;">
            <a  href="{{ route('receipt.index') }}">
                <i class="glyphicon glyphicon-asterisk"></i> <span>Receitas</span>
            </a>
        </li>
                    <li class="dropdown" style="background-color: #448DBA;">
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
