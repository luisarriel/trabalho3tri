<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idveiculo = $_POST['idveiculo'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$data = $_POST['data'];

$sql = "INSERT INTO servico (idveiculo, descricao, valor, data)
        VALUES (?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "isds", $idveiculo, $descricao, $valor, $data);

mysqli_stmt_execute($comando);

header("Location: home.php");
?>
