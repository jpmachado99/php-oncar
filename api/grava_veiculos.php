<?php
header('Content-Type: application/json');

require_once("../conexao.php");

try {
    //$stmt = $conn->prepare("INSERT INTO tbl_veiculos (id, name, password, question, answer)  VALUES (NULL, :name, :password, :question, :answer)");
    //$stmt->bindValue(":name", $_POST['name']);

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