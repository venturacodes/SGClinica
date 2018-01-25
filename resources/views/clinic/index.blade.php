@extends('base_index')

@section('index_title','Clínicas')
@section('index_add_button')
    <a href="{{route('clinic.create')}}" class="btn btn-primary pull-right" ><span class="glyphicon glyphicon-plus"></span>&nbsp;Adicionar</a>
@endsection
@section('index_table_data')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Endereço</th>
            <th>Ferramentas</th>
        </tr>
        </thead>
        <tbody>
        @isset($clinics)
            @foreach($clinics as $clinic)
                <tr>
                    <td>{{$clinic->id}}</td>
                    <td>{{$clinic->clinica}}</td>
                    <td>{{$clinic->address->cidade}}/{{\Illuminate\Support\Str::upper($clinic->address->uf)}}</td>
                    <td>{{$clinic->address->logradouro}}, {{ $clinic->address->numero}}, {{$clinic->address->complemento}}</td>
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
