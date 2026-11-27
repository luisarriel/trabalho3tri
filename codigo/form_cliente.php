<?php
require_once "verificar_sessao.php";
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<h1>Cadastrar Cliente</h1>
    <form action="salvar_cliente.php" method="GET">
        Nome: <br>
        <input type="text" name="nome"> <br><br>
        Telefone: <br>
        <input type="text" name="telefone"> <br><br>
        Endereço: <br>
        <input type="text" name="endereco"> <br><br>

        <input type="submit" value="Cadastrar"><br>
        <a href="home.php" class="redir">Ínicio</a>
    </form>

    
</body>

</html>