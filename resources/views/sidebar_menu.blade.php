<section class="sidebar">
    <ul class="sidebar-menu">
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
    </ul>
</section>