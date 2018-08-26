<form>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Agenda do médico</label>
        <select class="form-control" id="client" name="client" style="width: 100%" required>
        <option value="0">Selecione um médico</option>
        @foreach($data['clients'] as $clientes)
            @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}">{{$cliente->name}}</option>
             @endforeach
        @endforeach
        </select>
    </div>
</form>