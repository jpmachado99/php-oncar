
function excluir(id_veiculo) {
    bootbox.dialog({
        message: "Deseja excluir esse veículo?",
        buttons: {
            success: {
                label: "Confirmar",
                className: "btn-success",
                callback: function () {
                    $.ajax({
                        type: 'POST',
                        url: 'api/excluir_veiculo.php',
                        data: {
                            id_veiculo: id_veiculo
                        },
                        success: function(response) {
                            if (response.success) {
                                alert('Excluído com sucesso!');
                                location.reload();
                                return false;
                            } else {
                                alert('Erro ao excluir cadastro.');
                            }
                        }
                    });
                }
            },
            cancel: {
                label: "Cancelar",
                className: "btn-danger"
            }
        }
    });
    

}

function editar(id_veiculo, veiculo, marca, ano, descricao, vendido) {
    $('#id_veiculo').val(id_veiculo);
    $('#editVeiculo').val(veiculo);
    $('#editMarca').val(marca);
    $('#editAno').val(ano);
    $('#editDescricao').val(descricao);
    $('#editVendido').val(vendido);

    $("#formUpdateVeiculo").on('submit', function(event) {
        event.preventDefault();
        
        var form_data = $("#formUpdateVeiculo").serialize();
        $.ajax({
            type: 'POST',
            url: 'api/update_veiculos.php',
            data: form_data,            
            processData: false,
            success: function(response) {
                if (response.success) {
                    //console.log(response);

                    $('#modalEditar').modal('hide');
                    $('#formUpdateVeiculo').each (function(){
                        this.reset();
                    });
                    alert('Dados cadastrados com sucesso!!');
                    location.reload(true);
                } else {
                    alert('Erro ao salvar dados.');
                }
            }
        });
    });
}

function visualizar(id_veiculo) {

    $.ajax({
        type: 'GET',
        data: {
            id: id_veiculo
        },
        url: 'api/consulta_veiculos_by_id.php',            
        beforeSend: function( xhr ) {
            xhr.overrideMimeType( "text/plain; charset=UTF-8" );
        },
        success: function(response) {
            $("#modal-body-content").html(response);
        }
    });
}