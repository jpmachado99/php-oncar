<?php
header('Content-Type: application/json');
require_once("../conexao.php");

//  DEBUG
//print_r($_POST);
//die();

try {
    $stmt = $conn->prepare("INSERT INTO tbl_veiculos (veiculo, marca, ano, descricao, vendido)  VALUES (:veiculo, :marca, :ano, :descricao, :vendido)");
    $stmt->bindValue(":veiculo", $_POST['veiculo']);
    $stmt->bindValue(":marca", $_POST['marca']);
    $stmt->bindValue(":ano", $_POST['ano']);
    $stmt->bindValue(":descricao", $_POST['descricao']);
    $stmt->bindValue(":vendido", (isset($_POST['vendido']) ? '1':'0') );

    $stmt->execute();

} catch (PDOException $e) {
    die(json_encode(array(
        'success' => false,
        'msg' => utf8_encode('Erro ao inserir dados!'),
        'error' => utf8_encode($e->getMessage())
    )));
}

die(json_encode(array(
    'success' => true,
    'msg' => utf8_encode('Dados armazenados com sucesso!'),
    'error' => 0
)));