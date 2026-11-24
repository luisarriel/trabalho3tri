<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="salvar_veiculo.php" method="POST" enctype="multipart/form-data">
        Modelo: <br>
        <input type="text" name="modelo"> <br><br>

        Placa: <br>
        <input type="text" name="placa"> <br><br>

        Foto: <br>
        <input type="file" name="foto"> <br><br>

        Cliente: <br>
        <select name="idcliente">
            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM cliente";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $clientes = mysqli_stmt_get_result($comando);
            while ($cliente = mysqli_fetch_array($clientes)) {
                $cliente_id = $cliente['idcliente'];
                $cliente_nome = $cliente['nome'];

                echo "<option value='$cliente_id'>$cliente_nome</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>