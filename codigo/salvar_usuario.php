<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha_nova = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nome, email, senha)
        VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sss", $nome, $email, $senha_nova);

mysqli_stmt_execute($comando);

header("Location: index.php");
?>