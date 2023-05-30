<?php

if (!isset($_SESSION['admin'])) {
    session_start();
}

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("location: clientes.php");
    die();
}

include('lib/conexao.php');
include('lib/upload.php');

$id = intval($_GET['id']);
function limpar_texto($str)
{
    return preg_replace("/[^0-9]/", "", $str);
}

if (count($_POST) > 0) {

    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $dtnasc = $_POST['dtnasc'];
    $senha = $_POST['senha'];
    $sql_code_extra = "";
    $admin = $_POST['admin'];

    if (!empty($senha)) {
        if (strlen($senha) < 6 && strlen($senha) > 16) {
            $erro = "A senha deve ter entre 6 e 16 caracteres";
        } else {
            $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
            $sql_code_extra = "senha = '$senha_criptografada', ";
        }
    }
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
    if (strlen($telefone) != 11) {
        $erro = "O telefone deve ser preenchido no padrão (11) 98888-8888";
    }
}
$path = "";
if (isset($_FILES['foto'])) {
    $arq = $_FILES['foto'];
    $path = enviarArquivo($arq['error'], $arq['size'], $arq['name'], $arq['tmp_name']);
    if ($path == false) {
        $erro = "Falha ao enviar arquivo. Tente novamente.";
    } else {
        $sql_code_extra .= "foto = '$path', ";
    }
    if (!empty($_POST['foto_antiga'])) {
        unlink($_POST['foto_antiga']);
    }
}

if ($erro) {
    echo "<p><b>ERRO: $erro</b></p>";
} else {
    $sql_code = "UPDATE clientes
        SET nome = '$nome', 
        email = '$email', 
        $sql_code_extra
        telefone = '$telefone',
        dtnasc = '$dtnasc',
        admin = '$admin'
        WHERE id = '$id'";
    $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
    if ($deu_certo) {
        echo "<p><b>Cliente atualizado com sucesso!!!</b></p>";
        unset($_POST);
    }
}

$sql_cliente = "SELECT * FROM clientes WHERE id = '$id'";
$query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
$cliente = $query_cliente->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>

<body>
    <a href="clientes.php">Voltar para a lista</a>
    <form enctype="multipart/form-data" method="POST" action="">
        <p>
            <label>Nome:</label>
            <input value="<?php echo $cliente['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label>Senha:</label>
            <input value="" name="senha" type="text">
        </p>
        <p>
            <label>E-mail:</label>
            <input value="<?php echo $cliente['email']; ?>" name="email" type="text">
        </p>
        <p>
            <label>Telefone:</label>
            <input value="<?php if (!empty($cliente['telefone'])) echo formatar_telefone($cliente['telefone']); ?>" placeholder="(11) 98888-8888" name="telefone" type="text">
        </p>
        <p>
            <label>Data de Nascimento:</label>
            <input value="<?php if (!empty($cliente['dtnasc'])) echo formatar_data($cliente['dtnasc']); ?>" name="dtnasc" type="text">
        </p>
        <input name="foto_antiga" value="<?php echo $cliente['foto']; ?>" type="hidden">
        <?php
        if ($cliente['foto']) {
        ?>
            <p>
                <label>Foto atual do usuário</label>
                <img height="40" src="<?php echo $cliente['foto']; ?>" alt="">
            </p>
        <?php }
        ?>
        <p>
            <label>Nova foto de perfil:</label>
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