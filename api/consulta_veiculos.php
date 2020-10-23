<?php
header('Content-Type: application/json');

require_once("../conexao.php");

$data = $conn->query('SELECT * FROM TBL_VEICULOS');

if ($data) {
    $resultado = array();
    foreach($data as $row) {
        array_push($resultado, $row);
    }

    echo json_encode(array(
        'success' => true,
        'resultado' => $resultado
    ));
} else {
    echo json_encode(array(
        'success' => false,
        'msg' => 'Nenhum registro foi encontrado!'
    ));
}



?>

