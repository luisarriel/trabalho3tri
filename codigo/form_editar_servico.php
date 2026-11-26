<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idservico = $_GET['idservico'];

$sql = "SELECT * FROM servico WHERE idservico = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $idservico);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$servico = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar serviço</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Editar serviço</h1>

    <form action="salvar_edicao_servico.php" method="POST">

        <input type="hidden" name="idservico" value="<?php echo $servico['idservico']; ?>">

        Veículo:
        <br>

        <select name="idveiculo">

            <?php
            $sql = "SELECT * FROM veiculo";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $veiculos = mysqli_stmt_get_result($comando);

            while ($veiculo = mysqli_fetch_array($veiculos)) {

                $selecionado = "";

                if ($veiculo['idveiculo'] == $servico['idveiculo']) {
                    $selecionado = "selected";
                }

                echo "<option value='" . $veiculo['idveiculo'] . "' $selecionado>";
                echo $veiculo['modelo'] . " - " . $veiculo['placa'];
                echo "</option>";
            }
            ?>

        </select>

        <br><br>

        Descrição:
        <br>
        <input type="text" name="descricao" value="<?php echo $servico['descricao']; ?>">
        <br><br>

        Valor:
        <br>
        <input type="number" name="valor" step="0.01" value="<?php echo $servico['valor']; ?>">
        <br><br>

        Data:
        <br>
        <input type="date" name="data" value="<?php echo $servico['data']; ?>">
        <br><br>

        <input type="submit" value="Salvar alterações">



    </form>

    <a href="home.php">Ínicio</a>
</body>

</html>