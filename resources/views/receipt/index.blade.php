@extends('base_index')

@section('index_title','Receitas')
@section('index_add_button')
    <a href="{{route('receipt.create')}}" class="btn btn-primary pull-right" ><span class="glyphicon glyphicon-plus"></span>&nbsp;Adicionar</a>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome do Paciente</th>
            <th>Nome do medicamento</th>
            <th>Nome do médico</th>
            <th>Forma de uso</th>
            <th>Ferramentas</th>
        </tr>
        </thead>
        <tbody>
        @isset($receipts)
            @foreach($receipts as $receipt)
                <tr>
                    <td>{{$receipt->id}}</td>
                    <td>{{$receipt->Client->name}}</td>
                    <td>{{$receipt->Medicine->generic_name}}</td>
                    <td>{{$receipt->Collaborator->name}}</td>
                    <td>{{$receipt->form_of_use}}</td>
                    <td><div class="tools">
                            <a href="{{route('receipt.edit', $receipt->id)}}"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="{{route('receipt.delete', $receipt->id)}}"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
