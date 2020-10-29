<!-- Modal -->
<div id="modalEditar" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Veículo</h4>
            </div>
            <div class="modal-body">
                <form id='formUpdateVeiculo' method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="editVeiculo" class="col-sm-2 col-form-label">Veiculo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="editVeiculo" name="editVeiculo" placeholder="Veículo..." maxlength="100">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editMarca" class="col-sm-2 col-form-label">Marca: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="editMarca" name="editMarca" placeholder="Marca..." maxlength="50">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editAno" class="col-sm-2 col-form-label">Ano: </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="editAno" name="editAno" placeholder="Ano de Fabricação" pattern="\d*" maxlength="4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editDescricao" class="col-sm-2 col-form-label">Descrição: </label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="editDescricao" name="editDescricao" placeholder="Deixe aqui uma descrição do veículo..." rows="5" maxlength="1000"></textarea>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="editVendido" name="editVendido">
                        <label class="form-check-label" for="editVendido"> Já foi vendido?</label>
                    </div><br>
                    <div class="text-right"> 
                        <div class='btn-group'>
                            <button type="submit" class="btn btn-success" id="edit_veiculo">Salvar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
