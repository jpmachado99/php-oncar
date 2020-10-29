
function excluir(id_veiculo) {
    bootbox.dialog({
        message: "Deseja excluir esse veículo?",
        buttons: {
            success: {
                label: "Confirmar",
                className: "btn-success",
                callback: function () {
                    $.ajax({
                        url: 'api/excluir_veiculo.php',
                        type: 'POST',
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