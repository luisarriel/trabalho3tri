<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idveiculo = $_POST['idveiculo'];
$modelo = $_POST['modelo'];
$placa = $_POST['placa'];
$idcliente = $_POST['idcliente'];

$nome_arquivo = $_FILES['foto']['name'];

if ($nome_arquivo != "") {

    $caminho_temporario = $_FILES['foto']['tmp_name'];

    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    $novo_nome = uniqid() . "." . $extensao;

    $caminho_destino = "fotos_veiculos/" . $novo_nome;

    move_uploaded_file($caminho_temporario, $caminho_destino);

    $sql = "UPDATE veiculo
            SET modelo = ?, placa = ?, foto = ?, idcliente = ?
            WHERE idveiculo = ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "sssii", $modelo, $placa, $novo_nome, $idcliente, $idveiculo);

} else {

    $sql = "UPDATE veiculo
            SET modelo = ?, placa = ?, idcliente = ?
            WHERE idveiculo = ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "ssii", $modelo, $placa, $idcliente, $idveiculo);

}

mysqli_stmt_execute($comando);

header("Location: listar_veiculos.php");
?>