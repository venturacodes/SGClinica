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
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @isset($clinics)
            @foreach($clinics as $clinic)
                <tr>
                    <td>{{$clinic->id}}</td>
                    <td>{{$clinic->name}}</td>
                    <td><div class="tools">
                            <a href="{{route('clinic.edit', $clinic->id)}}"><i class="fas fa-edit"></i></a>
                            <a href="{{route('clinic.delete', $clinic->id)}}"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
