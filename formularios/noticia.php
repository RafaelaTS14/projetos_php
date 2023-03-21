<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>

</head>
<div class='center'>

    <head>
        <style>
            .center {
                margin: auto;
                text-align: center;
                width: 30%;
                padding: 10px;
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

        <h1 style="font-family:signika negative;" style: .center { margin: auto; width: 50%; padding: 10px; }> Preencha os dados abaixo: </h1>
        <b style="font-family:signika negative;">
    </body>
    <a style="font-family:signika negative;">
        <form method="GET" action="exibir.php">
            Nome: <input type="text" name="nome"><br><br>
            Idade: <input type="number" name="idade"><br><br>
            E-mail: <input type="text" name="email"><br><br>
            <button style="font-family:signika negative;" type="submit">Enviar</button>
        </form>
    </a>
</div>
</body>

</html>