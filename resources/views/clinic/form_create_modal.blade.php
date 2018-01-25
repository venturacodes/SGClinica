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
                    <div class="form-group">
                        <label for="name">CEP</label>
                        <input type="text" class="form-control" id="name" placeholder="CEP">
                    </div>
                    <div class="form-group">
                        <label for="uf">Estado</label>
                        <input type="text" name="uf" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control">
                    </div>
                   <div class="form-group">
                       <label for="bairro">Bairro</label>
                       <input type="text" name="bairro" class="form-control">
                    </div>
                   <div class="form-group">
                       <label for="logradouro">Logradouro</label>
                       <input type="text" name="logradouro"  class="form-control">
                    </div>
                   <div class="form-group">
                       <label for="numero">Número</label>
                       <input type="text" name="numero"  class="form-control">
                    </div>
                   <div class="form-group">
                       <label for="complemento">Complemento</label>
                       <input type="text" name="complemento"  class="form-control">
                    </div>
                    <button id="submit-clinic-modal" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>

    </div>
</div>