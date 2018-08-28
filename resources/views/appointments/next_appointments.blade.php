@extends('base_index')

@section('index_title','Meus próximos agendamentos')
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome do paciente</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Ferramentas</th>
        </tr>
        </thead>
        <tbody>
        @isset($appointments)
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{$appointment->id}}</td>
                    <td>{{$appointment->id}}</td>
                    <td>{{$appointment->start}}</td>
                    <td>{{$appointment->end}}</td>
                    <td><div class="tools">
                            <a href="{{route('appointment.delete', $appointment->id)}}"><span class="glyphicon glyphicon-th-list"></span></a>
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
