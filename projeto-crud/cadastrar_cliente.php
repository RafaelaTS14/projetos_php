<?php

if (!isset($_SESSION['admin'])) {
    session_start();
}

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("location: clientes.php");
    die();
}

function limpar_texto($str)
{
    return preg_replace("/[^0-9]/", "", $str);
}

if (count($_POST) > 0) {

    include('lib/upload.php');
    include('lib/conexao.php');
    include('lib/mail.php');

    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $dtnasc = $_POST['dtnasc'];
    $senha_desc = $_POST['senha'];
    $admin = $_POST['admin'];

    if (strlen($senha_desc) < 6 && strlen($senha_desc) > 16) {
        $erro = "A senha deve ter entre 6 e 16 caracteres";
    }


    if (empty($nome)) {
        $erro = "Preencha o nome";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Preencha o e-mail";
    }

    if (!empty($dtnasc)) {
        $pedacos = explode('/', $dtnasc);
        if (count($pedacos) == 3) {
            $dtnasc = implode('-', array_reverse($pedacos));
        } else {
            $erro = "A data de nascimento deve seguir o padrão dia/mes/ano.";
        }
    }

    if (!empty($telefone)) {
        $telefone = limpar_texto($telefone);
        if (strlen($telefone) != 11)
            $erro = "O telefone deve ser preenchido no padrão (11) 98888-8888";
    }

    $path = "";
    if (isset($_FILES['foto'])) {
        $arq = $_FILES['foto'];
        $path = enviarArquivo($arq['error'], $arq['size'], $arq['name'], $arq['tmp_name']);
        if ($path == false) {
            $erro = "Falha ao enviar arquivo. Tente novamente.";
        }
    }

    if ($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        $senha = password_hash($senha_desc, PASSWORD_DEFAULT);
        $sql_code = "INSERT INTO clientes (nome, email, telefone, dtnasc, senha, dtcad, foto, admin) 
        VALUES ('$nome', '$email', '$telefone', '$dtnasc', '$senha', NOW(), '$path', '$admin')";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if ($deu_certo) {
            enviar_email($email, "Sua conta no meu site foi criada", "
            <h1>Parabéns</h1>
            <p>Sua conta no meu site siteimaginario.com foi criada com sucesso!</p>
            <p>
            <b>Login:</b> $email<br>
            <b>Senha:</b> $senha_desc<br>
            </p>
            <p>Para fazer login, acesse siteimaginario.com/login.php</p>
            ");
            echo "<p><b>Cliente cadastrado com sucesso!!!</b></p>";
            unset($_POST);
        }
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>

<body>
    <a href="clientes.php">Voltar para a lista</a>
    <form enctype="multipart/form-data" method="POST" action="">
        <p>
            <label>Nome:</label>
            <input value="<?php if (isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label>E-mail:</label>
            <input value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" name="email" type="text">
        </p>
        <p>
            <label>Telefone:</label>
            <input value="<?php if (isset($_POST['telefone'])) echo $_POST['telefone']; ?>" placeholder="(11) 98888-8888" name="telefone" type="text">
        </p>
        <p>
            <label>Data de Nascimento:</label>
            <input value="<?php if (isset($_POST['dtnasc'])) echo $_POST['drnasc']; ?>" name="dtnasc" type="text">
        </p>
        <p>
            <label>Senha:</label>
            <input value="<?php if (isset($_POST['senha'])) echo $_POST['senha']; ?>" name="senha" type="text">
        </p>
        <p>
            <label>Foto de perfil:</label>
            <input name="foto" type="file">
        </p>
        <p>
            <label>Tipo:</label>
            <input name="admin" value="1" type="radio"> Administrador
            <input name="admin" value="0" checked type="radio"> Cliente
        </p>
        <p>
            <button type="submit">Salvar Cliente</button>
        </p>
    </form>
</body>

</html>