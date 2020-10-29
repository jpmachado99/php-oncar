<?php
header('Content-Type: application/json');
require_once("../conexao.php");

//  DEBUG
//print_r($_POST);
//die();

try {
    $stmt = $conn->prepare("");
    $stmt->bindValue(":veiculo", $_POST['veiculo']);
    $stmt->bindValue(":marca", $_POST['marca']);
    $stmt->bindValue(":ano", $_POST['ano']);
    $stmt->bindValue(":descricao", $_POST['descricao']);
    $stmt->bindValue(":vendido", (isset($_POST['vendido']) ? '1':'0') );

    $stmt->execute();

} catch (PDOException $e) {
    die(json_encode(array(
        'success' => false,
        'msg' => utf8_encode('Erro ao alterados dados!'),
        'error' => utf8_encode($e->getMessage())
    )));
}

die(json_encode(array(
    'success' => true,
    'msg' => utf8_encode('Dados alterados com sucesso!'),
    'error' => 0
)));