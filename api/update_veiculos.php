<?php
header('Content-Type: application/json');
require_once("../conexao.php");

//  DEBUG
//print_r($_POST);
//die();

try {
    $stmt = $conn->prepare("
        UPDATE tbl_veiculos 
        SET veiculo = :veiculo,
            marca = :marca,
            ano = :ano,
            descricao = :descricao,
            vendido = :vendido,
            updated = :udpated
        WHERE id_veiculo = :id_veiculo;");
    $stmt->bindParam(":id_veiculo", $_POST['id_veiculo'], PDO::PARAM_INT);
    $stmt->bindValue(":veiculo", $_POST['editVeiculo']);
    $stmt->bindValue(":marca", $_POST['editMarca']);
    $stmt->bindValue(":ano", $_POST['editAno']);
    $stmt->bindValue(":descricao", $_POST['editDescricao']);
    $stmt->bindValue(":vendido", (isset($_POST['vendido']) ? 1 : 0) );
    $stmt->bindValue(":udpated", date('Y-m-d H:i:s') );

    $stmt->execute();

} catch (PDOException $e) {
    die(json_encode(array(
        'success' => false,
        'msg' => utf8_encode('Erro ao alterar os dados!'),
        'error' => utf8_encode($e->getMessage())
    )));
}

die(json_encode(array(
    'success' => true,
    'msg' => utf8_encode('Dados alterados com sucesso!'),
    'error' => 0
)));