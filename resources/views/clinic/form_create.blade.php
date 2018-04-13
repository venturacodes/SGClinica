@extends('base_form')
@section('back_button')
    <a href="{{ route('client.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Cadastrar clínica')
@section('form_content')
    <form method="POST" action="{{route('clinic.store')}}">
        {{ csrf_field() }}
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control">
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control">
        <label for="email">E-mail</label>
        <input type="email" name="email"  class="form-control">
        @include('address.partial_form_create')
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
