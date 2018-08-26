<form>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Agenda do médico</label>
        <select class="form-control" id="client" name="client" style="width: 100%" required>
        <option value="0">Selecione um médico</option>
        @foreach($data['collaborators'] as $collaborators)
            @foreach($collaborators as $collaborator)
                <option value="{{$collaborator->id}}">{{$collaborator->name}}</option>
             @endforeach
        @endforeach
        </select>
    </div>
</form>