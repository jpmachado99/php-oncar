<?php
error_reporting(E_ALL ^ E_NOTICE);

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teste PHP - OnCar</title>

        <link href="styles/css/bootstrap.min.css" rel="stylesheet">
        <link href="styles/fontawesome-5/css/all.css" rel="stylesheet"> <!--load all styles -->
        <link href="styles/css/jquery.gritter.css" rel="stylesheet">

    </head>
    <body> 

        <div class="container col-md-10">
            <div class="principal">
                <script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
                <script src="styles/js/bootstrap.min.js"></script>
                <script src="styles/js/jquery.gritter.js"></script>  
                <script src="styles/js/bootbox.min.js"></script>  

                <h1 class="text-center"> João Multimarcas <i class='fas fa-car'></i></h1>  <br><br>
                
                <div id="main" class="container-fluid text-center">
                    <h4 class="page-header text-primary">Carros Disponíveis</h4>
                </div>

                <div id="div_veiculos" class="table-responsive">                    
                    <table id="tbl_veiculos" class='table table-striped table-condensed'>
                        <thead>
                            <th>Veículo</th>
                            <th>Marca</th>
                            <th>Ano</th>
                            <th>Vendido</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                
                <div class='text-right'>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCadastrar">Cadastrar</button>
                    </div>
                </div>

                <?php require_once("modal_cadastro.php"); ?>
                <?php require_once("modal_editar.php"); ?>
                <?php require_once("modal_visualizar.php"); ?>              


            </div> <!-- principal -->
        </div> <!-- container -->

    </body>
</html>

<script src="funcoes.js"></script>
<script>
    $(document).ready(function(){
        getVeiculos();


        function getVeiculos() {
            jQuery.ajax({
                type: "GET",
                url: "api/consulta_veiculos.php",
                success: function(response) {
                    if (response.success){
                        //console.log(response);

                        $.each(response.resultado, function() {

                            if (this.vendido == 0) {
                                vend = "Não";
                            } else {
                                vend = "Sim";
                            }

                            var html = 
                            "<tr><td>"
                                + this.veiculo +
                            "</td><td>"
                                + this.marca +
                            "</td><td>"
                                + this.ano +
                            "</td><td style='display:none'>"
                                + this.descricao +
                            "</td><td>"
                                + vend +
                            "</td><td>" 
                                + " <a id='view'    data-id="+ this.id_veiculo +" href='#modalView'   data-toggle='modal' title='visualizar'> <i class='fa fa-search text-primary'></i></a>  "
                                + " <a id='editar'  data-id="+ this.id_veiculo +" href='#modalEditar' data-toggle='modal' title='editar'>     <i class='fa fa-pen text-primary'></i></a>  "
                                + " <a id='excluir' data-id="+ this.id_veiculo +" title='excluir'> <i class='far fa-trash-alt text-primary'></i></a> " +
                            "</td></tr>";

                            $('#tbl_veiculos > tbody').append(html);
                        });

                    } else {
                        var html = 
                        "<div class='alert alert-warning text-center'> <strong>"+response.msg+"</strong></div>";
                    }
                }
            });
        }

        $('#tbl_veiculos tbody').on('click', 'a', function() {
            var elem_id = $(this).attr('id');
            var id_veiculo = $(this).attr("data-id");

            if (elem_id == 'excluir' ) {
                excluir(id_veiculo);
            } else if (elem_id == 'editar') {

                veiculo = $(this).parents('tr').find('td').eq(0).text();
                marca = $(this).parents('tr').find('td').eq(1).text();
                ano = $(this).parents('tr').find('td').eq(2).text();
                descricao = $(this).parents('tr').find('td').eq(3).text();
                vendido = $(this).parents('tr').find('td').eq(4).text() == 'Sim' ? 1 : 0;

                editar(id_veiculo, veiculo, marca, ano, descricao, vendido);
            } else {
                visualizar(id_veiculo);
            }
        });


        $("#formCadastrarVeiculo").on('submit', function(event) {
            event.preventDefault();
            var form_data = $("#formCadastrarVeiculo").serialize();

            $.ajax({
                type: 'POST',
                url: 'api/grava_veiculos.php',
                data: form_data,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        //console.log(response);

                        $('#modalCadastrar').modal('hide');
                        $('#formCadastrarVeiculo').each (function(){
                            this.reset();
                        });
                        alert('Dados cadastrados com sucesso!!');
                        location.reload(true);
                    } else {
                        alert('Erro ao salvar dados.');
                        $('#modalCadastrar').modal('hide');
                        $('#formCadastrarVeiculo').each (function(){
                            this.reset();
                        });
                    }
                }
            });

        });

    });
</script>
