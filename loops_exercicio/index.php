<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício loop</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>
<div>

    <body>
        <h1>Aprovados e Reprovados</h1>

        <?php
        $notas_dos_alunos = [
            '7.4', '1.7', '8.5', '3.5', '4.4', '8.7', '6.4', '8.4', '1.2', '4.3', '9.8', '0.5', '8.2',
            '4.7', '1.1', '3.3', '3.4', '4.8', '8.7', '5.4', '2.2', '3.7', '5.9', '7.4', '4.8', '4.7', '1.5', '8.4', '2.1', '2.7'
        ];
        $i = 0;
        $situacao = 0;
        $aprovados = 0;
        $reprovados = 0;
        ?>

        <table>
            <tr>
                <th>Nota</th>
                <th>Situação</th>
            </tr>
            <?php foreach ($notas_dos_alunos as $i => $notas) { ?>
                <tr>
                    <td><?php echo $notas; ?></td>
                    <td><?php echo ($notas >= 6) ? 'Aprovado!' : 'Reprovado!'; ?></td>
                </tr>
                <tr>
                    <td colspan="1" style="border-top: 1px solid black;"></td>
                </tr>
            <?php } ?>
        </table>
</div>
</body>

</html>