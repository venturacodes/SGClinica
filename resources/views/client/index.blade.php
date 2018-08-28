@extends('base_index')

@section('index_title','Pacientes')
@section('index_add_button')
    <a href="{{route('client.create')}}" class="btn btn-primary pull-right" ><span class="glyphicon glyphicon-plus"></span>&nbsp;Adicionar</a>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ferramentas</th>
        </tr>
        </thead>
        <tbody>
        @isset($clients)
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone}}</td>
                    <td><div class="tools">
                            <a href="{{route('client.delete', $client->id)}}"><span class="glyphicon glyphicon-th-list"></span></a>
                            <a href="{{route('client.edit', $client->id)}}" alt='editar'><span class="glyphicon glyphicon-edit" ></span></a>
                            <a href="{{route('client.delete', $client->id)}}"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
