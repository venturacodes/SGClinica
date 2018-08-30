<label for="email">Especialidade</label>
<select class="form-control" id="role-id" name="role_id" required>
    <option value="0">Selecione uma especialidade</option>
    @foreach($roles as $role)
    <option value="{{$role->id}}">{{$role->name}}</option>
    @endforeach
</select>
<label for="email">E-mail</label>
<input type="text" name="email" class="form-control">
<label for="password">Senha</label>
<input type="password" name="password" class="form-control">
<label for="password-confirm">Confirmação de senha</label>
<input type="password" name="password-confirm" class="form-control">
