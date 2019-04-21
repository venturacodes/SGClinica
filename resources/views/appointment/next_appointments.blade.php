@extends('base_index')
@section('index_title','Meus próximos agendamentos')
@section('index_search_button')
<form class="form-inline" method="POST" action="{{route('appointment.searchByName')}}">
    {{ csrf_field() }}
    <input class="form-control" type="text" placeholder="Buscar" name="name">
    <button class="btn btn-outline-success btn-primary" type="submit">Buscar por Nome</button>
</form>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nome do paciente</th>
            <th>Período da consulta</th>
            <th>Ferramentas</th>
        </tr>
        </thead>
        <tbody>
        @isset($appointments)
            @foreach($appointments as $appointment)
                <tr> 
                    <td>{{$appointment->client->name}}</td>
                    <td>{{date('d/m/Y H:i', strtotime($appointment->start))}} até {{date('H:i', strtotime($appointment->end))}}</td>
                    <td><div class="tools">
                            <a href="{{route('appointment.attend_to', $appointment->id)}}"><span class="glyphicon glyphicon-th-list"></span></a>
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
