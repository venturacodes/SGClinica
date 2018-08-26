<div class="modal fade" id="clinic-modal-create" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nova Clínica</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-modal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Clínica</label>
                        <input type="text" class="form-control" id="name" placeholder="Nome da clínica">
                    </div>
                    <button id="submit-clinic-modal" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>

    </div>
</div>