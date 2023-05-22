<?php

include('conexao.php');
$id = intval($_GET['id']);

function limpar_texto($str)
{
    return preg_replace("/[^0-9]/", "", $str);
}


if (count($_POST) > 0) {

    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dtnasc = $_POST['dtnasc'];
    $telefone = $_POST['telefone'];

    if (empty($nome)) {
        $erro = 'Preencha o nome!';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'Preencha o E-mail!';
    }

    if (!empty($dtnasc)) {
        $pedacos = explode('/', $dtnasc);
        if (count($pedacos) == 3) {
            $dtnasc = implode('-', array_reverse($pedacos));
        } else {
            $erro = "A data de nascimento deve seguir o padrão DD/MM/AAAA";
        }
    }

    if (!empty($telefone)) {
        $telefone = limpar_texto($telefone);
        if (strlen($telefone) != 11) {
            $erro = "O telefone deve ser preenchido no padrão (11) 98888-8888";
        }
    }
    if ($erro) {
        echo  '<p>' . '<b>' . $erro . '</p>';
    } else {
        $sql_code = "UPDATE clientes 
        SET nome = '$nome',
        email = '$email',
        telefone = '$telefone',
        dtnasc = '$dtnasc'
        WHERE id = '$id'";

        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if ($deu_certo) {
            echo "<p> <b> Cliente atualizado com sucesso!<b> </p>";
            unset($_POST);
        }
    }
}

$sql_cliente = "SELECT * FROM clientes WHERE id ='$id'";
$query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
$cliente = $query_cliente->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>

<body>
    <a href="clientes.php">Voltar para a listagem</a>
    <form method='POST' action="">
        <p>
            <label>Nome:</label>
            <input value="<?php echo $cliente['nome']; ?>" name='nome' type='text'><br>
        </p>
        <p>
            <label>E-mail:</label>
            <input value="<?php echo $cliente['email']; ?>" name='email' type='text'><br>
        </p>
        <p>
            <label>Telefone:</label>
            <input value="<?php if (!empty($cliente['telefone'])) echo formatar_telefone($cliente['telefone']); ?>" placeholder="(11) 98888-8888" name='telefone' type='text'><br>
        </p>
        <p>
            <label>Data de Nascimento:</label>
            <input value="<?php if (!empty($cliente['dtnasc'])) echo formatar_data($cliente['dtnasc']); ?>" name='dtnasc' type='text'><br>
        </p>
        <p>
            <button type='submit'>Salvar Cliente</button>
        </p>
    </form>
</body>

</html>