<?php

include("conexao.php");

if (isset($_GET['deletar'])) {

    $id = intval($_GET['deletar']);
    $sql_query = $mysqli->query("SELECT * FROM arquivos WHERE id = '$id'") or die($mysqli->error);
    $arquivo = $sql_query->fetch_assoc();

    if (unlink($arquivo['path'])) {
        $deu_certo = $mysqli->query("DELETE FROM arquivos WHERE id = '$id'") or die($mysqli->error);
        if ($deu_certo) {
            echo "<p>Arquivo excluído com sucesso</p>";
        }
    }
}

function enviarArquivo($error, $size, $filename, $tmp_name)
{

    include("conexao.php");

    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
    }
    if ($error) {
        die("Falha ao enviar o arquivo");
    }

    if ($size > 2097152) {
        die("Arquivo muito grande: Max. 2MB");
    }

    $pasta = "arquivos/";
    $nomeDoArquivo = $filename;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {
        die("Tipo de arquivo não aceito");
    }

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($tmp_name, $path);

    if ($deu_certo) {
        $mysqli->query("INSERT INTO arquivos (filename, path) VALUES ('$nomeDoArquivo', '$path')") or die($mysqli->error);
        return true;
    } else {
        return false;
    }
}

if (isset($_FILES['arquivos'])) {
    $arquivos = $_FILES['arquivos'];
    $tudo_certo = true;
    foreach ($arquivos['name'] as $index => $arq) {
        $deu_certo = enviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index]);

        if (!$deu_certo) {
            $tudo_certo = false;
            echo "<p>Falha ao enviar um ou mais arquivos</p>";
        } else {
            echo "<p>Todos os arquivos foram enviados com sucesso!</p>";
        }
    }
}
$sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data" action="">
        <p><label for="">Selecione o arquivo</label>
            <input multiple name="arquivos[]" type="file">
        </p>
        <button name="upload" type="submit">Enviar arquivo</button>
    </form>

    <table border="1" cellpadding="10">
        <thead>
            <th>Preview</th>
            <th>Arquivo</th>
            <th>Data de Envio</th>
            <th></th>
        </thead>
        <tbody>
            <?php

            while ($arquivo = $sql_query->fetch_assoc()) {
            ?>
                <tr>
                    <td><img height="50" src="<?php echo $arquivo['path']; ?>" alt=""></td>
                    <td><a target="_blank" href="<?php echo $arquivo['path']; ?>"><?php echo $arquivo['filename']; ?></a></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($arquivo['dtupload'])); ?></td>
                    <td><a href="index.php?deletar=<?php echo $arquivo['id']; ?>">Deletar</a></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>