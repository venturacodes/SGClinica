<header class="header">
    <a href="#" class="logo" data-toggle="collapse" data-target="#demo">
        <span class="logo-mini"><b>P</b>UC</span>
        <span class="logo-lg"><b>PUC</b>linica</span>
        
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        @if(!Auth::guest())
            <div class="navbar-left">
                    <ul class="nav navbar-nav navbar-left" >
                        <li><a href="" >Bem vindo, {{Auth::user()->email}}</a></li>
                    </ul>
            </div>
        @endif
        <div class="navbar-right">
            <ul class="nav navbar-nav navbar-right" >
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Entrar</a></li>
                    <li><a href="{{ route('register') }}">Registrar-se</a></li>
                @else
                    <li class="dropdown" style="background-color: #448DBA;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             <i class="glyphicon glyphicon-menu-hamburger"></i><span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li class=dropdown-item>
                                <a href="{{ route('appointment.next_appointments') }}">
                                    <i class="glyphicon glyphicon-calendar"></i> <span>Meus próximos agendamentos</span>
                                </a>
                            </li>        
                            <li class=dropdown-item>
                                <a href="{{ route('report.show') }}">
                                    <i class="glyphicon glyphicon-dashboard"></i> <span>Meus relatórios</span>
                                </a>
                            </li>
                            <li class=dropdown-item>
                                <a href="{{ route('appointment.agenda') }}">
                                    <i class="glyphicon glyphicon-calendar"></i> <span>Minha agenda</span>
                                </a>
                            </li>
                            <li class=dropdown-item>
                                <a href="{{ route('collaborator.index') }}">
                                    <i class="glyphicon glyphicon-user"></i> <span>Médicos da clínica</span>
                                </a>
                            </li >
                            <li class=dropdown-item>
                                <a href="{{ route('clinic.index') }}">
                                    <i class="glyphicon glyphicon-briefcase"></i> <span>Minhas clínicas</span>
                                </a>
                            </li >
                            <li class=dropdown-item>
                                <a  href="{{ route('client.index') }}">
                                    <i class="glyphicon glyphicon-heart"></i> <span>Meus pacientes</span>
                                </a>
                            </li>
                            <li class=dropdown-item>
                                <a  href="{{ route('medicine.index') }}">
                                    <i class="glyphicon glyphicon-asterisk"></i> <span>Medicamentos cadastrados</span>
                                </a>
                            </li>
                            <li class=dropdown-item>
                                <a  href="{{ route('receipt.index') }}">
                                    <i class="glyphicon glyphicon-asterisk"></i> <span>Receitas cadastradas</span>
                                </a>
                            </li>
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
