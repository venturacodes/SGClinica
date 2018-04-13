@extends('base_form')

@section('back_button')
    <a href="{{ route('clinic.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Editar clinica')

@section('form_content')
    <form method="POST" action="{{route('clinic.update', $data->clinic->id)}}">
        {{ csrf_field() }}
        <label for="name">Nome da clinica</label>
        <input type="text" name="name" class="form-control" value="{{$data->clinic->name}}">
        <label for="phone">Telefone</label>
        <input type="text" name="phone" class="form-control" value="{{$data->clinic->phone}}">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control" value="{{$data->clinic->email}}">
        @include('address.partial_form_update')
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection

