<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$idveiculo = $_GET['idveiculo'];

$sql = "SELECT * FROM veiculo WHERE idveiculo = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $idveiculo);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$veiculo = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar veículo</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Editar veículo</h1>

    <form action="salvar_edicao.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="idveiculo" value="<?php echo $veiculo['idveiculo']; ?>">

        Modelo:
        <br>
        <input type="text" name="modelo" value="<?php echo $veiculo['modelo']; ?>">
        <br><br>

        Placa:
        <br>
        <input type="text" name="placa" value="<?php echo $veiculo['placa']; ?>">
        <br><br>

        Foto atual:
        <br>
        <img src="fotos_veiculos/<?php echo $veiculo['foto']; ?>" width="100">
        <br><br>

        Nova foto:
        <br>
        <input type="file" name="foto">
        <br><br>

        Cliente:
        <br>
        <select name="idcliente">

            <?php
            $sql = "SELECT * FROM cliente";

            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_execute($comando);

            $clientes = mysqli_stmt_get_result($comando);

            while ($cliente = mysqli_fetch_array($clientes)) {
                $cliente_id = $cliente['idcliente'];
                $cliente_nome = $cliente['nome'];

                $selecionado = "";

                if ($cliente_id == $veiculo['idcliente']) {
                    $selecionado = "selected";
                }

                echo "<option value='$cliente_id' $selecionado>$cliente_nome</option>";
            }
            ?>

        </select>
        <br><br>

        <input type="submit" value="Salvar alterações">


    </form>

    <a href="home.php">Ínicio</a>
</body>

</html>