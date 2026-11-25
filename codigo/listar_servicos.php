<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$sql = "SELECT servico.*, veiculo.modelo, veiculo.placa
        FROM servico, veiculo
        WHERE servico.idveiculo = veiculo.idveiculo";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Serviços cadastrados</title>
</head>
<body>

    <h1>Serviços cadastrados</h1>

    <a href="form_servico.php">Cadastrar serviço</a>
    <br><br>

    <?php
    while ($servico = mysqli_fetch_array($resultado)) {
    ?>

        Veículo: <?php echo $servico['modelo']; ?>
        <br>

        Placa: <?php echo $servico['placa']; ?>
        <br>

        Descrição: <?php echo $servico['descricao']; ?>
        <br>

        Valor: R$ <?php echo $servico['valor']; ?>
        <br>

        Data: <?php echo $servico['data']; ?>

        <hr>

    <?php
    }
    ?>

</body>
</html>
