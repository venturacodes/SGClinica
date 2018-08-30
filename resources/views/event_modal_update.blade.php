<div class="modal fade" id="event-modal-update" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Atualizar agendamento</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-modal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" id="update-title" placeholder="Titulo">
                        <label for="collaborator">Médico</label>
                        <select class="form-control" id="update-collaborator" name="collaborator" disabled>
                            <option value="0">Selecione um médico</option>
                            @foreach($data['collaborators'] as $funcionarios)
                                @foreach($funcionarios as $funcionario)
                                    <option value="{{$funcionario->id}}">{{$funcionario->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <label for="client">Paciente</label>
                        <select class="form-control" id="update-client-id" name="client">
                            <option value="0">Selecione um paciente</option>
                            @foreach($data['clients'] as $clientes)
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <label for="note">Observação</label>
                        <textarea id="update-note" name="note" class="form-control"></textarea>
                    </div>
                    <input type="hidden" id="update-start" value="">
                    <input type="hidden" id="update-end" value="">
                    <input type="hidden" id="event-id" value="">
                    <div class="form-inline">
                        <button id="update-modal" class="btn btn-info btn-block">Atualizar</button>
                        <button id="delete-modal" class="btn btn-danger btn-block">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>