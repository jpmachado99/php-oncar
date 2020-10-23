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
        <!-- <link href="styles/fontawesome-5/css/all.css" rel="stylesheet"> load all styles -->
    </head>
    <body> 

        <div class="container">
            
            <div class="principal">

                <script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
                <script src="styles/js/bootstrap.min.js"></script>

                <h3 class="text-center">Concessionária</h3>

                <div id="main" class="container-fluid">
                    <h5 class="page-header">Template Inicial</h5>
                </div>

                <div id="veiculos">
                    


                </div>




            </div> <!-- principal -->
        </div> <!-- container -->



    </body>
</html>

<script>
    $(document).ready(function(){
        $('#veiculos').load('api/consulta_veiculos.php');
    });
</script>