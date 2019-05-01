@extends('base_form')
@section('back_button')
    <a href="{{ route('medicine.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Editar medicamento')
@section('form_content')
    <form method="POST" action="{{$medicine->id ? route('medicine.update', $medicine->id) : route('medicine.store') }}">
        {{ csrf_field() }}
        @method('PUT')
        <label for="name">Nome genérico</label>
        <input type="text" name="generic_name" class="form-control" value="{{$medicine->generic_name ? $medicine->generic_name : ''}}">
        <label for="phone">Nome de fábrica</label>
        <input type="text" name="manufacturer_name"  class="form-control" value="{{$medicine->manufacturer_name ? $medicine->manufacturer_name : ''}}">
        <label for="phone">Fábrica</label>
        <input type="text" name="manufacturer"  class="form-control" value="{{$medicine->manufacturer ? $medicine->manufacturer : ''}}">
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
