<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
</head>
<div class='center'>

    <head>
        <style>
            .center {
                margin: auto;
                text-align: center;
                width: 30%;
                padding: 12px;
            }

            a {
                color: #7AA9EB
            }

            h1 {
                color: white
            }

            b {
                color: white
            }
        </style>
    </head>

    <body style="background-color:#070C0F;">

        <h1 style="font-family:signika negative;" style: .center { margin: auto; width: 50%; padding: 10px; }> Dados do usuário: </h1>
        <a style="font-family:signika negative;">
            <b style="font-family:signika negative;">
                <?php

                echo "Nome de usuário: " . "</b>" . $_POST['nome'] . '<br>';
                echo "<b>" . "Idade do usuário: " . "</b>" . $_POST['idade'] . '<br>';
                echo "<b>" . "E-mail do usuário: " . "</b>" . $_POST['email'] . '<br>';

                ?>
        </a>
    </body>

</html>