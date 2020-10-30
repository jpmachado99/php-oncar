<!-- Modal -->
<div id="modalCadastrar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-primary">Cadastro de Veículos</h3>
            </div>
            <div class="modal-body">
                <form id='formCadastrarVeiculo' method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="veiculo" class="col-sm-2 col-form-label">Veiculo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="veiculo" name="veiculo" placeholder="Veículo..." maxlength="100">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="marca" class="col-sm-2 col-form-label">Marca: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca..." maxlength="50">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ano" class="col-sm-2 col-form-label">Ano: </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano de Fabricação" pattern="\d*" maxlength="4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descricao" class="col-sm-2 col-form-label">Descrição: </label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="Deixe aqui uma descrição do veículo..." rows="5" maxlength="1000"></textarea>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="vendido" name="vendido" value="1">
                        <label class="form-check-label" for="vendido"> Já foi vendido?</label>
                    </div><br>
                    <div class="text-right"> 
                        <div class='btn-group'>
                            <button type="submit" class="btn btn-success" id="add_veiculo">Salvar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>