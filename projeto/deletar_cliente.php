<?php
if (isset($_POST['confirmar'])) {

    include('conexao.php');
    $id = intval($_GET['id']);
    $sql_code = "DELETE FROM clientes WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if ($sql_query) { ?>

        <h1>Cliente deletado com Sucesso!</h1>
        <p> <a href="clientes.php"> Clique aqui </a> para retornar a lista de clientes</p>
<?php
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cliente</title>
</head>

<body>
    <h1>Tem certeza de que deseja deletar este cliente?</h1>
    <form action="" method="post">
        <a style="margin-right:40px" href="clientes.php">Não</a>
        <button name="confirmar" value="1" type="submit">Sim</button>
    </form>

</body>

</html>