@extends('base_index')

@section('index_title','Clínicas')
@section('index_add_button')
    <a href="{{route('clinic.create')}}" class="btn btn-app  pull-right"><i class="fa fa-plus" aria-hidden="true"></i><strong>Adicionar</strong></a>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ferramentas</th>
        </tr>
        </thead>
        <tbody>
        @isset($clinics)
            @foreach($clinics as $clinic)
                <tr>
                    <td>{{$clinic->id}}</td>
                    <td>{{$clinic->name}}</td>
                    <td><div class="tools">
                            <a href="{{route('clinic.edit', $clinic->id)}}"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="{{route('clinic.delete', $clinic->id)}}"><span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
