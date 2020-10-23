<?php
header('Content-Type: application/json');

require_once("../conexao.php");

$select = "
SELECT * 
FROM TBL_VEICULOS";

$carros = array();
$sql = mysqli_query(
    $conexao, 
    "SELECT * FROM TBL_VEICULOS"
);

while($carro = mysqli_fetch_assoc($sql)) {
    array_push($carros, $carro);

    echo json_encode(array(
        'veiculo' => $carro['veiculo'],
        'marca' => $carro['marca'],
        'descricao' => utf8_encode( substr($carro['descricao'], 0, 40) ),
        'vendido' => $carro['vendido']
    ));
}

?>

