<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$nome = $_GET['nome'];
$telefone = $_GET['telefone'];
$endereco = $_GET['endereco'];

$sql = "INSERT INTO cliente (nome, telefone, endereco)
        VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sss", $nome, $telefone, $endereco);

mysqli_stmt_execute($comando);

header("Location: home.php");
?>