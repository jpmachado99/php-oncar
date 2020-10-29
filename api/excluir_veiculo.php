<?php
header('Content-Type: application/json');
require_once("../conexao.php");


try {
    $stmt = $conn->prepare("DELETE FROM tbl_veiculos WHERE id_veiculo =  :id_veiculo");
    $stmt->bindParam(':id_veiculo', $_POST['id_veiculo'], PDO::PARAM_INT);   
    $stmt->execute();
} catch (PDOException $e) {
    die(json_encode(array(
        'success' => false,
        'erro' => $e
    )));
}

die(json_encode(array(
    'success' => true,
    'erro' => 0
)));

?>