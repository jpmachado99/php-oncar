<?php
header('Content-Type: application/json');
require_once("../conexao.php");

//  DEBUG
//print_r($_GET);
//die();

$stmt = $conn->prepare('SELECT veiculo, marca, ano, descricao, vendido FROM TBL_VEICULOS WHERE id_veiculo = :id_veiculo');
$stmt->execute(['id_veiculo' => $_GET["id"]]);
$data = $stmt->fetch();

if ($stmt) { ?>
    
    <div class='table-responsive'>
        <table class='table'>    
            <tbody>
                <tr>
                    <td><strong>Veículo: </strong> <?php echo $data["veiculo"]; ?> </td>
                </tr>
                <tr>
                    <td><strong>Marca: </strong> <?php echo $data["marca"]; ?> </td>
                </tr>
                <tr>
                    <td><strong>Ano: </strong> <?php echo $data["ano"]; ?> </td>
                </tr>
                <tr>
                    <td> 
                        <strong>Descrição: </strong><?php echo $data["descricao"]; ?>  &nbsp;
                    </td>
                </tr>   
                <tr>
                    <td> 
                        <strong>Vendido?: </strong><?php echo ($data["vendido"] == 1 ? 'Sim' : 'Não' ); ?>  &nbsp;
                    </td>
                </tr>          
            </tbody>
        </table>
    </div>

<?php
} else { ?>
    <div class="alert alert-warning">
        Erro ao encontrar veículo!!
    </div>
<?php
}
