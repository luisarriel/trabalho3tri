<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idservico = $_POST['idservico'];
$idveiculo = $_POST['idveiculo'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$data = $_POST['data'];

$sql = "UPDATE servico
        SET idveiculo = ?, descricao = ?, valor = ?, data = ?
        WHERE idservico = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "isdsi", $idveiculo, $descricao, $valor, $data, $idservico);

mysqli_stmt_execute($comando);

header("Location: pesquisar_servicos.php");
?>
