<div class="modal fade" id="job-modal-create" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nova profissão</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-modal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Profissão</label>
                        <input type="text" class="form-control" id="name" placeholder="Insira a profissão..">
                    </div>
                    <button id="submit-job-modal" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>

    </div>
</div>