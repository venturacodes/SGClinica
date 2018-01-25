<section class="sidebar">
    <ul class="sidebar-menu">
        <li >
            <a href="{{ route('appointment.show') }}">
                <i class="glyphicon glyphicon-calendar"></i> <span>Meus agendamentos</span>
            </a>
        </li>
        <li>
            <a href="{{ route('collaborator.index') }}">
                <i class="glyphicon glyphicon-user"></i> <span>Funcionários</span>
            </a>
        </li>
        <li>
            <a href="{{ route('clinic.index') }}">
                <i class="glyphicon glyphicon-briefcase"></i> <span>Clínicas</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('client.index') }}">
                <i class="glyphicon glyphicon-heart"></i> <span>Clientes</span>
            </a>
        </li>
        <li>
            <a href="{{ route('home.download_app') }}">
                <i class="glyphicon glyphicon-phone"></i> <span>Baixar Aplicativo</span>
            </a>
        </li>
    </ul>
</section>