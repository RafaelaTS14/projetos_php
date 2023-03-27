<?php

$erro = false;
if (count($_POST) > 0) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dtnasc = $_POST['dtnasc'];
    $telefone = $_POST['telefone'];

    if (empty($nome)) {
        $erro = 'Preencha o nome!';
    }
    if (empty($email)) {
        $erro = 'Preencha o E-mail!';
    }

    if (!empty($dtnasc)) {
        $tmp=explode('/', $nascimento);
        if(count($tmp) == 3) {
        $pedacoes=implode('-', array_reverse());
        $nascimento=
        } else {
             
        }
    }
    if ($erro) {
        echo  '<p>' . '<b>' . $erro . '</p>';
    } else {
      
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
    <a href="/clientes.php">Voltar para a listagem</a>
    <form method='POST' action="">
        <p>
            <label>Nome:</label>
            <input name='nome' type='text'><br>
        </p>
        <p>
            <label>E-mail:</label>
            <input name='email' type='text'><br>
        </p>
        <p>
            <label>Data de Nascimento:</label>
            <input name='dtnasc' type='text'><br>
        </p>
        <p>
            <label>Telefone:</label>
            <input name='telefone' type='text'><br>
        </p>
        <p>
            <button type='submit'>Salvar Cliente</button>
        </p>
    </form>
</body>

</html>