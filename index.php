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
    </head>
    <body> 

        <div class="container">
            
            <div class="principal">

                <script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
                <script src="styles/js/bootstrap.min.js"></script>

                <h2 class="text-center"> João Multimarcas <i class='fas fa-car'></i></h2>  <br><br>
                
                <div id="main" class="container-fluid text-center">
                    <h5 class="page-header text-primary">Carros Disponíveis</h5>
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




            </div> <!-- principal -->
        </div> <!-- container -->



    </body>
</html>

<script>
    $(document).ready(function(){
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

                        iconEditar  = "<i class='fa fa-pen'></i>";
                        iconAdicionar = "<i class='fa fa-plus'></i>";

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
                            + "<a id='editar'><i class='fa fa-pen text-primary' aria-hidden='true'></i></a>  <a id='adicionar'><i class='fa fa-plus-circle text-primary' aria-hidden='true'></i></a>" +
                        "<td></tr>"
                        ;
                        $('#tbl_veiculos > tbody').append(html);
                    });

                } else {
                    var html = 
                    "<div class='alert alert-warning text-center'> <strong>"+response.msg+"</strong></div>";

                    $("#div_veiculos").html(html);
                    $(".container-fluid").html("your new header");
                }
            },
        });


    });
</script>

<style>
i {
    padding: 5px;
}
</style>