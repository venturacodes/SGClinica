@extends('base_index')

@section('index_title','Pacientes')
@section('index_add_button')
    <a href="{{route('client.create')}}" class="btn btn-app  pull-right"><i class="fa fa-plus" aria-hidden="true"></i><strong>Adicionar</strong></a>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Detalhes</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @isset($clients)
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->phone}}</td>
                    <td style="text-align:center"><a href="{{route('client.show', $client->id)}}"><span class="glyphicon glyphicon-th-list"></span></a></td>
                    <td style="text-align:center"><div class="tools">
                            
                            <a href="{{route('client.edit', $client->id)}}" alt='editar'><i class="fas fa-edit"></i></a>
                            <a href="{{route('client.delete', $client->id)}}"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
