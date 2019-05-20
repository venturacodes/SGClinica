<form>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Agenda do médico</label>
        <select class="form-control" id="search-collaborator" name="collaborator" style="width: 100%" required>
        <option value="">Selecione um médico</option>
        @foreach($data['collaborators'] as $collaborators)
            @foreach($collaborators as $collaborator)
                <option value="{{$collaborator->id}}">{{$collaborator->name}}</option>
             @endforeach
        @endforeach
        </select>
    </div>
</form>