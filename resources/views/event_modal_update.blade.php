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
                        <label for="clinica">Clinica</label>
                        <select class="form-control" id="update-clinic" name="clinica">
                            <option value="0">Selecione uma clinica</option>
                            @foreach($data['clinic'] as $clinicas)
                                @foreach($clinicas as $clinica)
                                    <option value="{{$clinica->id}}">{{$clinica->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <label for="collaborator">Funcionário</label>
                        <select class="form-control" id="update-collaborator" name="collaborator">
                            <option value="0">Selecione um funcionário</option>
                            @foreach($data['collaborators'] as $funcionarios)
                                @foreach($funcionarios as $funcionario)
                                    <option value="{{$funcionario->id}}">{{$funcionario->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <label for="client">Cliente</label>
                        <select class="form-control" id="update-client" name="client">
                            <option value="0">Selecione um cliente</option>
                            @foreach($data['clients'] as $clientes)
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <label for="status">Situação do Agendamento</label>
                        <select class="form-control" id="status" name="status">
                            <option value="0">Selecione uma situação</option>
                            <option value="1">Marcado</option>
                            <option value="2">Confirmado</option>
                            <option value="3">Desmarcado</option>
                        </select>
                        <label for="note">Observação</label>
                        <textarea id="update-note" name="note" class="form-control"></textarea>
                    </div>
                    <input type="hidden" id="start-time" value="">
                    <input type="hidden" id="end-time" value="">
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