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

                <h1 class="text-center"> João Multimarcas <i class='fas fa-car'></i></h1>  <br><br>
                
                <div id="main" class="container-fluid text-center">
                    <h4 class="page-header text-primary">Carros Disponíveis</h4>
                </div>

                <div id="div_veiculos">
                    <table id="tbl_veiculos" class='table Xtable-bordered Xtable-hover Xtable-condensed'>
                        <thead>
                            <th>Veículo</th>
                            <th>Marca</th>
                            <th>Ano</th>
                            <th>Vendido</th>
                            <th></th>
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

                <!-- Modal -->
                <div id="modalCadastrar" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Cadastro de Veículos</h4>
                            </div>
                            <div class="modal-body">
                                <form id='formCadastrarVeiculo' method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="veiculo" class="col-sm-2 col-form-label">Veiculo:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="veiculo" placeholder="Veículo..." maxlength="100">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="marca" class="col-sm-2 col-form-label">Marca: </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="marca" placeholder="Marca..." maxlength="50">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ano" class="col-sm-2 col-form-label">Ano: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="ano" placeholder="Ano de Fabricação" pattern="\d*" maxlength="4">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="descricao" class="col-sm-2 col-form-label">Descrição: </label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" id="descricao" placeholder="Deixe aqui uma descrição do veículo..." rows="5" maxlength="1000"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="vendido">
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


            </div> <!-- principal -->
        </div> <!-- container -->



    </body>
</html>

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
                            "</td><td>"
                                + vend +
                            "</td><td>" 
                                + "<a id='editar'><i class='fa fa-pen text-primary' aria-hidden='true'></i></a>  <a id='visualizar'><i class='fa fa-search text-primary'></i></i></a>" +
                            "<td></tr>" +
                            "<input type='hidden' name='id_veiculo' value='"+this.id_veiculo+"' />";
                            $('#tbl_veiculos > tbody').append(html);
                        });

                    } else {
                        var html = 
                        "<div class='alert alert-warning text-center'> <strong>"+response.msg+"</strong></div>";

                        $("#div_veiculos").html(html);
                        $(".container-fluid").html("your new header");
                    }
                }
            });
        }

        


        $("#formCadastrarVeiculo").on('submit', function(event) {
            event.preventDefault();
            var postData = new FormData($("#formCadastrarVeiculo")[0]);

            $.ajax({
                type: 'POST',
                data: postData,
                url: 'api/grava_veiculos.php',
                success: function(response) {
                    if (response.success) {
                        alert("Sucesso!!!");   
                    } else {
                        alert("Erro!!!");
                    }
                }
            });
        });

    });
</script>
