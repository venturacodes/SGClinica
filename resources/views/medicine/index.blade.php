@extends('base_index')

@section('index_title','Medicamentos')
@section('index_add_button')
    <a href="{{route('medicine.create')}}" class="btn btn-app  pull-right"><i class="fa fa-plus" aria-hidden="true"></i><strong>Adicionar</strong></a>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome genérico</th>
            <th>Nome de fábrica</th>
            <th>Fabricante</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @isset($medicines)
            @foreach($medicines as $medicine)
                <tr>
                    <td>{{$medicine->id}}</td>
                    <td>{{$medicine->generic_name}}</td>
                    <td>{{$medicine->manufacturer_name}}</td>
                    <td>{{$medicine->manufacturer}}</td>
                    <td><div class="tools">
                            <a href="{{route('medicine.edit', $medicine->id)}}"><i class="fas fa-edit"></i></a>
                            <a href="{{route('medicine.delete', $medicine->id)}}"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
@endsection
