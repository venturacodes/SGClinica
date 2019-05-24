@extends('base_index')
@section('index_title','Pacientes')
@section('index_search_button')
<form class="form-inline" method="GET" action="{{route('client.index')}}">
    {{ csrf_field() }}
<button class="btn btn-outline-success my-2 my-sm-0 btn-primary" type="submit">Remover filtro nome parecido com {{$filtered_content}}</button>
</form>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nome do paciente</th>
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
    {{$clients->links()}}
@endsection
