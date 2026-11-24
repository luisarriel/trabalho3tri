<?php
require_once "conexao.php";

$nome = $_GET['nome'];
$telefone = $_GET['telefone'];
$endereco = $_GET['endereco'];

$sql = "INSERT INTO cliente (nome, telefone, endereco) VALUES ('$nome','$telefone', '$endereco')";

mysqli_query($conexao, $sql);

header("Location: home.php");
