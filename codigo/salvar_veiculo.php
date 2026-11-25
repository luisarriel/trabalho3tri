<?php
require_once "conexao.php";

$modelo = $_POST['modelo'];
$placa = $_POST['placa'];
$idcliente = $_POST['idcliente'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "fotos_veiculos/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);

$sql = "INSERT INTO veiculo (modelo, placa, foto, idcliente)
        VALUES (?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sssi", $modelo, $placa, $novo_nome, $idcliente);

mysqli_stmt_execute($comando);

header("Location: home.php");
?>