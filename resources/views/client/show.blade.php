@extends('base_form')
@section('back_button')
    <a href="{{ route('client.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Verificar paciente')
@section('form_content')

    <form method="POST" action="{{route('client.store')}}">
        {{ csrf_field() }}
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value="{{$client->name}}" disabled>
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control" value="{{$client->phone}}" disabled>
        <label for="email">E-mail</label>
        <input type="text" name="email"  class="form-control" value="{{$client->email}}" disabled>
        <label for="email">E-mail</label>
        <input type="text" name="email"  class="form-control" value="{{$client->email}}" disabled>
        <section class="panel">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
                <span class="navbar-brand" href="#">
                <span>Histórico de consultas</span>
                </span>
            </nav>
            <div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Finalidade</th>
                    <th>Médico responsável</th>
                    <th>Data da consulta</th>
                    <th>Horário inicio e fim da consulta</th>
                    <th>Observação</th>
                </tr>
                </thead>
                <tbody>
                @isset($client['appointments'])
                    @foreach($client['appointments'] as $appointments)
                        @foreach($appointments as $appointment)
                        <tr>
                            <td>{{$appointment->title}}</td>
                            <td>{{$appointment->collaborator->name}}</td>
                            <td>{{date('d/m/Y', strtotime($appointment->start))}}</td>
                            <td>{{date('H:i', strtotime($appointment->start))}} - {{date('H:i', strtotime($appointment->end))}}</td>
                            <td>{{$appointment->note}}</td>
                        </tr>
                        @endforeach
                    @endforeach
                @endisset
                </tbody>
            </table>
            </div>
        </section>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="background-color:#FAFAFA">
            <span class="navbar-brand" href="#">
               <span>Exames solicitados</span>
               FALTA FAZER
            </span>
        </nav>
    </form>
@endsection
