<?php
header('Content-Type: application/json');

require_once("../conexao.php");

$stmt = $conn->prepare('SELECT * FROM TBL_VEICULOS WHERE, id_veiculo = :id_veiculo');
$stmt->bindValue(":id_veiculo", $_POST['id_veiculo']);
$stmt->execute();

if ($stmt) {
    print_r('1');
} else {
    print_r('3');
}




// if ($data) {


//     echo json_encode(array(
//         'success' => true,
//         'resultado' => $resultado
//     ));
// } else {
//     echo json_encode(array(
//         'success' => false,
//         'msg' => 'Nenhum registro foi encontrado!'
//     ));
// }



?>

