<?php

function gerarNumeros($inicio, $fim)
{
    $lista = [];
    if ($fim <= $inicio) {
        echo "Não dá pra continuar";
    } else {
        for ($i = $inicio; $i <= $fim; $i++) {
            $lista[] = $i;
        }
    }
    return $lista;
}

$variavel = gerarNumeros(1, 5);
foreach ($variavel as $num) {
    echo $num . "<br>";
}
