@extends('base_form')

@section('back_button')
    <a href="{{ route('client.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Editar cliente')

@section('form_content')
    <form method="POST" action="{{route('client.update', $client->id)}}">
        {{ csrf_field() }}
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value="{{$client->name}}">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control" value="{{$client->user->email}}">
        <label for="password">Senha</label>
        <input type="text" name="password" class="form-control" value="{{$client->user->password}}">
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control" value="{{$client->phone}}">
        <label for="cep">CEP</label>
        <input type="text" name="cep" class="form-control" value="{{$client->address->cep}}">
        <label for="uf">Estado</label>
        <input type="text" name="uf" class="form-control" value="{{$client->address->uf}}">
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" class="form-control" value="{{$client->address->cidade}}">
        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" class="form-control" value="{{$client->address->bairro}}">
        <label for="logradouro">Logradouro</label>
        <input type="text" name="logradouro"  class="form-control" value="{{$client->address->logradouro}}">
        <label for="numero">Número</label>
        <input type="text" name="numero"  class="form-control" value="{{$client->address->numero}}">
        <label for="complemento">Complemento</label>
        <input type="text" name="complemento"  class="form-control" value="{{$client->address->complemento}}">

        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection

