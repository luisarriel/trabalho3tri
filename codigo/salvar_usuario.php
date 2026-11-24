<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha_nova = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nome, email, senha, foto) VALUES ('$nome','$email', '$senha_nova')";

mysqli_query($conexao, $sql);

header("Location: index.php");
?>