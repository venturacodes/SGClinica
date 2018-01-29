<div class="modal fade" id="event-modal-create" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Novo agendamento</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-modal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" class="form-control" id="title" placeholder="Titulo">
                        <label for="clinica">Clinica</label>
                        <select class="form-control" id="clinic" name="clinica">
                            <option value="0">Selecione uma clinica</option>
                            @foreach($data['clinic'] as $clinicas)
                                @foreach($clinicas as $clinica)
                                    <option value="{{$clinica->id}}">{{$clinica->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <label for="collaborator">Funcionário</label>
                        <select class="form-control" id="collaborator" name="collaborator">
                            <option value="0">Selecione um funcionário</option>
                            @foreach($data['collaborators'] as $funcionarios)
                                @foreach($funcionarios as $funcionario)
                                    <option value="{{$funcionario->id}}">{{$funcionario->name}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <label for="client">Cliente</label>
                        <select class="form-control" id="client" name="client" style="width: 100%">
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
                            <option value="1" selected>Marcado</option>
                            <option value="2">Confirmado</option>
                            <option value="3">Desmarcado</option>
                        </select>
                        <label for="note">Observação</label>
                        <textarea id="note" name="note" class="form-control"></textarea>
                    </div>
                    <input type="hidden" id="start-time" value="">
                    <input type="hidden" id="end-time" value="">
                    <input type="hidden" id="event" value="">
                    <button id="submit-modal" class="btn btn-success btn-block">Agendar</button>
                </form>
            </div>
        </div>
    </div>
</div>