<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$modelo = $_POST['modelo'];
$placa = $_POST['placa'];
$tipo = $_POST['tipo'];
$idcliente = $_POST['idcliente'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$nome_arquivo = uniqid() . "." . $extensao;

move_uploaded_file($caminho_temporario, "fotos_veiculos/" . $nome_arquivo);

$sql = "INSERT INTO veiculo (modelo, placa, foto, idcliente, tipo)
        VALUES (?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sssis", $modelo, $placa, $nome_arquivo, $idcliente, $tipo);

mysqli_stmt_execute($comando);

header("Location: home.php");
?>