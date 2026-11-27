<?php
require_once "verificar_sessao.php";
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar serviço</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <h1>Cadastrar serviço</h1>

    <form action="salvar_servico.php" method="POST">

        Veículo:
        <br>

        <select name="idveiculo">

            <option value="">Selecione um veículo</option>

            <?php
            $sql = "SELECT * FROM veiculo";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $veiculos = mysqli_stmt_get_result($comando);

            while ($veiculo = mysqli_fetch_array($veiculos)) {
                echo "<option value='" . $veiculo['idveiculo'] . "'>";
                echo $veiculo['modelo'] . " - " . $veiculo['placa'];
                echo "</option>";
            }
            ?>

        </select>

        <br><br>

        Descrição:
        <br>
        <input type="text" name="descricao">
        <br><br>

        Valor:
        <br>
        <input type="number" name="valor">
        <br><br>

        Data:
        <br>
        <input type="date" name="data">
        <br><br>

        <input type="submit" value="Cadastrar serviço">
        <a href="home.php">Ínicio</a>

    </form>

    

</body>

</html>
