@extends('base_form')
@section('back_button')
    <a href="{{ route('collaborator.index') }}" class="btn btn-primary a"><span class="glyphicon glyphicon-arrow-left"></span></a>
@endsection
@section('form_title','Cadastrar Funcionário')
@section('form_content')
    <form method="POST" action="{{route('collaborator.update', $collaborator->id)}}">
        {{ csrf_field() }}
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value={{$collaborator->name}}>
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="form-control"value={{$collaborator->phone}}>
        <label for="email">Especialidade</label>
        <select class="form-control" id="role-id" name="role_id" required>
            <option value="0">Selecione uma especialidade</option>
                @foreach($roles as $role)
                    @if($role->name == $collaborator->user->role->name)
                        <option value="{{$role->id}}" selected>{{$role->name}}</option>
                    @else
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endif
                @endforeach
        </select>
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control" value="{{$collaborator->user->email}}">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control" placeholder="Digite nova senha">

        <br />
        <input type="submit" value="salvar" class="btn btn-block btn-primary">
    </form>
@endsection
