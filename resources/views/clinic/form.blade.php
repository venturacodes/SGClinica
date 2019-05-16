@extends('base_form')
@section('form_title', isset($clinic) ? 'Editar Clínica' : 'Cadastrar Clínica')

@section('form_content')
    <form method="POST" action="{{isset($clinic) ? route('clinic.update', $clinic->id) : route('clinic.store')}}">
        {{ csrf_field() }}
        @if(isset($clinic))
            @method('PUT')
        @endif
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value="{{isset($clinic) ? $clinic->name : ''}}">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control" value="{{ isset($clinic) ? $clinic->email : ''}}">
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control" value="{{isset($clinic) ? $clinic->phone : ''}}">
        <label for="address">Endereço</label>
        <input type="text" name="address"  class="form-control" value="{{isset($clinic) ? $clinic->address : ''}}">
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection

