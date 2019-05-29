@extends('base_form')
@section('form_title',isset($collaborator) ? 'Editar Funcionário':'Cadastrar Funcionário')
@section('form_content')
    <form method="POST" action="{{ isset($collaborator) ? route('collaborator.update', $collaborator->id) : route('collaborator.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @isset($collaborator)
            @method('PUT')
        @endisset
        <br />
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value='{{isset($collaborator) ? $collaborator->name : ''}}'>
        <label for="phone">Telefone</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input type="text" name="phone"  class="form-control" data-inputmask='"mask": "(099) 9999-9999"' data-mask value='{{ isset($collaborator) ? $collaborator->phone : ''}}' >
        </div>
        
        <label for="email">Especialidade</label>
        <select class="form-control" id="role-id" name="role_id" required>
            <option value="">Selecione uma especialidade</option>
                @foreach($roles as $role)
                    <option @if(isset($collaborator)) @if($role->name == $collaborator->user->role->name) selected @endif @endif value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
        </select>
        <label for="email">E-mail</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            <input type="email" name="email" class="form-control" value="{{ isset($collaborator) ? $collaborator->user->email : ''}}">
        </div>
        @isset($collaborator->user->image)
            <picture>
                <img name="avatar" class="img-thumbnail" src="{{asset('storage/'.$collaborator->user->image)}}" style="width:80px;height:80px; border-radius:50px;"/>
            </picture>
        @endisset
        <label for="image">Avatar</label>
        <div class="input-group">
            <input type="file" name="image" class="form-control">
        </div>
        @isset($collaborator->signature)
            <picture>
                <img name="avatar" class="img-thumbnail" src="{{asset('storage/'.$collaborator->signature)}}" style="width:80px;height:80px; border-radius:50px;"/>
            </picture>
        @endisset
        <label for="signature">Assinatura</label>
        <div class="input-group">
            <input type="file" name="signature" class="form-control">
        </div>
        <label for="name">Número de CRM(Cons. Regional de Medicina)</label>
        <input type="text" name="crm" placeholder="Em branco se não for médico" class="form-control" value='{{isset($collaborator) ? $collaborator->crm : ''}}'>
        
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control" placeholder="Digite nova senha">

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
