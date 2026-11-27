<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$pesquisa = "";

if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
}

$sql = "SELECT servico.*, veiculo.modelo, veiculo.placa
        FROM servico, veiculo
        WHERE servico.idveiculo = veiculo.idveiculo
        AND (veiculo.modelo LIKE ? OR veiculo.placa LIKE ?)";

$comando = mysqli_prepare($conexao, $sql);

$busca = "%" . $pesquisa . "%";

mysqli_stmt_bind_param($comando, "ss", $busca, $busca);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pesquisar serviços</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Pesquisar serviços</h1>

    

    <form action="pesquisar_servicos.php" method="GET">

        Modelo ou placa:
        <br>

        <input type="text" name="pesquisa" value="<?php echo $pesquisa; ?>">

        <input type="submit" value="Pesquisar">
        <a href="home.php">Ínicio</a><br><br>

    </form>

    <br>
<div class="lista">
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
        <br>

        <a href="form_editar_servico.php?idservico=<?php echo $servico['idservico']; ?>">Editar</a>

        <hr>

    <?php
    }
    ?>
</div>
</body>

</html>