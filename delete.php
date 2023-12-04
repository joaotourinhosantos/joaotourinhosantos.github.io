<?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'mysql';

        $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

        $sql = "DELETE FROM `produtos` WHERE id=$id";
        $conexao->query($sql);

    }
    header("location: cad_produto.php");
    exit;
?>