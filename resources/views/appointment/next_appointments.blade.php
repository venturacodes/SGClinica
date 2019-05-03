@extends('base_index')
@section('index_title','Meus próximos agendamentos')
@section('index_search_button')
<form method="POST" action="{{route('appointment.searchByName')}}">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
    </div>
</form>
@endsection
@section('index_table_data')
    
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Período da consulta</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @isset($appointments)
            @foreach($appointments as $appointment)
                <tr> 
                    <td>{{$appointment->client->name}}</td>
                    <td>{{date('d/m/Y H:i', strtotime($appointment->start))}} até {{date('H:i', strtotime($appointment->end))}}</td>
                    <td><div class="tools">
                            <a href="{{route('appointment.attend_to', $appointment->id)}}" class="btn"><i class="fas fa-heartbeat"></i></a>
                            <a href="{{route('appointment.delete', $appointment->id)}}" class="btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
