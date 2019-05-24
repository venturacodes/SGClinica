@extends('base_index')
@section('index_title','Medicamentos')
@section('index_search_button')
<form class="form-inline" method="GET" action="{{route('medicine.index')}}">
    {{ csrf_field() }}
<button class="btn btn-outline-success my-2 my-sm-0 btn-primary" type="submit">Remover filtro nome genérico parecido com {{$filtered_content}}</button>
</form>
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
    {{$medicines->links()}}
@endsection
