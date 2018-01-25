@extends('base_index')

@section('index_title','Funcionários')
@section('index_add_button')
    <a href="{{route('collaborator.create')}}" class="btn btn-primary pull-right" ><span class="glyphicon glyphicon-plus"></span>&nbsp;Adicionar</a>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Função</th>
            <th>Clínicas atendidas</th>
            <th>Cor</th>
            <th>Ferramentas</th>
        </tr>
        </thead>
        <tbody>
        @isset($collaborators)

            @foreach($collaborators as $collaborator)
                <tr>
                    <td>{{$collaborator->id}}</td>
                    <td>{{$collaborator->name}}</td>
                    <td>{{$collaborator->phone}}</td>
                    <td>{{$collaborator->job->name}}</td>
                    <td>@foreach($collaborator->clinics as $clinic)
                        {{$clinic->clinica}}
                    @endforeach</td>
                    <td class="active" style="background: {{$collaborator->color}};"></td>
                    <td><div class="tools">
                            <a href="{{route('collaborator.edit', $collaborator->id)}}"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="{{route('collaborator.delete', $collaborator->id)}}"><span class="glyphicon glyphicon-remove"></span></a>
                        </div></td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
