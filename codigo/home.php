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
    <h1>Início</h1>
    <hr>
    <div class="opcoes">
        <a href="form_cliente.php">Novo cliente</a>
        <a href="form_veiculo.php">Novo veículo</a>
        <a href="form_servico.php">Novo serviço</a>
        <a href="listar_veiculos.php">Listar veículos</a>
        <a href="listar_servicos.php">Listar serviços</a>
        <a href="pesquisar_servicos.php">Buscar serviços</a>
    </div>
    <hr>
    <div class="opcoes">
        <a href="sair.php">Sair</a>
    </div>
</body>

</html>