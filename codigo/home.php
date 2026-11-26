<?php
require_once "verificar_sessao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <h1>Ínicio</h1>
    <hr>
    <a href="form_cliente.php">Novo cliente</a> <br>
    <a href="form_veiculo.php">Novo veículo</a> <br>
    <a href="form_servico.php">Novo serviço</a> <br>
    <a href="listar_veiculos.php">Listar veículos</a> <br>
    <a href="listar_servicos.php">Listar serviços</a> <br>
    <a href="pesquisar_servicos.php">Buscar serviços</a> <br><br>
    <hr>
    <a href="sair.php">Sair</a>
</body>

</html>