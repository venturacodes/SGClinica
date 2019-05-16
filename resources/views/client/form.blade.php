@extends('base_form')
@section('form_title',isset($client) ? 'Editar paciente' : 'Cadastrar paciente')
@section('form_content')

    <form method="POST" action="{{isset($client) ? route('client.update', $client->id) : route('client.store')}}">
        {{ csrf_field() }}
        @isset($client)
            @method('PUT')
        @endisset
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value="{{isset($client) ? $client->name : ''}}">
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control" data-inputmask='"mask": "(099) 9999-9999"' data-mask value="{{isset($client) ? $client->phone : ''}}">
        <label for="email">E-mail</label>
        <input type="text" name="email"  class="form-control"value="{{isset($client) ? $client->email : ''}}">
        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
@section('additional-js')
    <script src="{{URL::asset('js/adminlte/bower_components/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script>
        $(function(){
            $('[data-mask]').inputmask()
        })
    </script>
@endsection
