@extends('base_index')
@section('index_title','Meus próximos agendamentos')
@section('index_search_button')
<form class="form-inline" method="GET" action="{{route('appointment.next_appointments')}}">
    {{ csrf_field() }}
<button class="btn btn-outline-success my-2 my-sm-0 btn-primary" type="submit">Remover filtro nome {{$appointments[0]->client->name}}</button>
</form>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nome do paciente</th>
            <th>Data da consulta</th>
            <th>Início da consulta</th>
            <th>Final da consulta</th>
            <th>Ferramentas</th>
        </tr>
        </thead>
        <tbody>
        @isset($appointments)
            @foreach($appointments as $appointment)
                <tr> 
                    <td>{{$appointment->client->name}}</td>
                    <td>{{date('d/m/Y', strtotime($appointment->start))}}</td>
                    <td>{{date('H:i', strtotime($appointment->start))}}</td>
                    <td>{{date('H:i', strtotime($appointment->end))}}</td>
                    <td><div class="tools">
                            <a href="{{route('appointment.attendTo', $appointment->id)}}"><span class="glyphicon glyphicon-th-list"></span></a>
                            <a href="{{route('appointment.edit', $appointment->id)}}" alt='editar'><span class="glyphicon glyphicon-edit" ></span></a>
                            <a href="{{route('appointment.delete', $appointment->id)}}"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
