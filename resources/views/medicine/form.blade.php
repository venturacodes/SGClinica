@extends('base_form')
@section('form_title', isset($medicine) ? 'Editar Medicamento' : 'Cadastrar Medicamento')    
@section('form_content')
    <form method="POST" action="{{ isset($medicine)? route('medicine.update', $medicine->id) : route('medicine.store') }}">
        @if(isset($medicine))
            @method('PUT')
        @endif
        {{ csrf_field() }}
        
        <label for="name">Nome genérico</label>
        <input type="text" name="generic_name" class="form-control" value="{{ isset($medicine) ? $medicine->generic_name : ''}}">
        <label for="phone">Nome de fábrica</label>
        <input type="text" name="manufacturer_name"  class="form-control" value="{{ isset($medicine) ? $medicine->manufacturer_name : ''}}">
        <label for="phone">Fábrica</label>
        <input type="text" name="manufacturer"  class="form-control" value="{{isset($medicine) ? $medicine->manufacturer : ''}}">
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
