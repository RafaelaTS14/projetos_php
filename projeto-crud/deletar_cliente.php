<?php

if (!isset($_SESSION['admin'])) {
    session_start();
}

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("location: clientes.php");
    die();
}

if (isset($_POST['confirmar'])) {

    include("lib/conexao.php");
    $id = intval($_GET['id']);

    $sql_cliente = "SELECT foto FROM clientes WHERE id = '$id'";
    $query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
    $cliente = $query_cliente->fetch_assoc();


    $sql_code = "DELETE FROM clientes WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if ($sql_query) {
        if (!empty($cliente['foto'])) {
            unlink($cliente['foto']);
        }
?>
        <h1>Cliente deletado com sucesso!</h1>
        <p><a href="clientes.php">Clique aqui</a> para voltar para a lista de clientes.</p>
<?php
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cliente</title>
</head>

<body>
    <h1>Tem certeza que deseja deletar este cliente?</h1>

    <form action="" method="post">
        <a style="margin-right:40px;" href="clientes.php">Não</a>
        <button name="confirmar" value="1" type="submit">Sim</button>
    </form>
</body>

</html>