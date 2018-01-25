@extends('base_form')
@section('back_button')
    <a href="{{ route('client.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Cadastrar cliente')
@section('form_content')

    <form method="POST" action="{{route('client.store')}}">
        {{ csrf_field() }}
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control">
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control">
        <label for="clinic">Clínica</label>
        <select name="clinic"  class="form-control">
            <option value="1">Clinica Chapecó</option>
        </select>
        @include('user.partial_form_create')
        @include('address.partial_form_create')
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
