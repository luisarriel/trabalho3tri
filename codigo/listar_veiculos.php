<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$sql = "SELECT veiculo.*, cliente.nome
        FROM veiculo, cliente
        WHERE veiculo.idcliente = cliente.idcliente";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos cadastrados</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Veículos cadastrados</h1>

    <a href="form_veiculo.php">Cadastrar veículo</a><br><a href="home.php">Ínicio</a><br><br>

    <?php
    while ($veiculo = mysqli_fetch_array($resultado)) {
    ?>

        Modelo: <?php echo $veiculo['modelo']; ?>
        <br>

        Placa: <?php echo $veiculo['placa']; ?>
        <br>

        Cliente: <?php echo $veiculo['nome']; ?>
        <br>

        Foto:
        <br>

        <img src="fotos_veiculos/<?php echo $veiculo['foto']; ?>" width="100">
        <br>

        <a href="form_editar.php?idveiculo=<?php echo $veiculo['idveiculo']; ?>">Editar</a>

        <hr>

    <?php
    }
    ?>

</body>

</html>