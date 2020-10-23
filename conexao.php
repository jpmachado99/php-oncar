<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=bd_veiculos', 'root', '');
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>