<?php

function limpar_texto($str)
{
    return preg_replace("/[^0-9]/", "", $str);
}


if (count($_POST) > 0) {

    include('conexao.php');

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
        $sql_code = "INSERT INTO clientes (nome, email, telefone, dtnasc, datacad) 
        VALUES('$nome', '$email', '$telefone', '$dtnasc', NOW())";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if ($deu_certo) {
            echo "<p>'Cliente cadastrado com sucesso!'</p>";
            unset($_POST);
        }
    }
}

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
            <input value="<?php if (isset($_POST['nome'])) echo $_POST['nome']; ?>" name='nome' type='text'><br>
        </p>
        <p>
            <label>E-mail:</label>
            <input value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" name='email' type='text'><br>
        </p>
        <p>
            <label>Data de Nascimento:</label>
            <input value="<?php if (isset($_POST['dtnasc'])) echo $_POST['dtnasc']; ?>" name='dtnasc' type='text'><br>
        </p>
        <p>
            <label>Telefone:</label>
            <input value="<?php if (isset($_POST['telefone'])) echo $_POST['telefone']; ?>" placeholder="(11) 98888-8888" name='telefone' type='text'><br>
        </p>
        <p>
            <button type='submit'>Salvar Cliente</button>
        </p>
    </form>
</body>

</html>