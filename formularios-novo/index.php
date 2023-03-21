<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form method="POST" action="">

        <h1>Formulário com PHP</h1>

        <p class="error">* Obrigatório</p>

        Nome: <input required name="nome" type="text"><span class="error">*</span><br><br>
        E-mail: <input required name="email" type="e-mail"><span class="error">*</span><br><br>
        Website: <input name="website" type="url"><br><br>
        Comentário: <textarea name="comentario" cols="30" rows="3"> </textarea><br><br>
        Gênero: <input name="genero" value=masculino type="radio"> Masculino
        <input name="genero" value="feminino" type="radio"> Feminino
        <input name="genero" value="outros" type="radio"> Outros
        <br><br>

        <button name="enviado" type="submit">Enviar</button>

        <h1>Dados enviados:</h1>

        <?php

        if (isset($_POST["enviado"])) {
            echo "<p>Nome: " . $_POST["nome"] . "<p>";
            echo "<p>E-mail: " . $_POST["email"] . "<p>";
            echo "<p>Website: " . $_POST["website"] . "<p>";
            echo "<p>Comentário: " . $_POST["comentario"] . "<p>";
            echo "<p>Gênero: " . $_POST["genero"] . "<p>";
        }
        ?>
</body>

</html>