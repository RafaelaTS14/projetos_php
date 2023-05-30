<?php

function enviarArquivo($error, $size, $filename, $tmp_name)
{

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
        return $path;
    } else {
        return false;
    }
}
