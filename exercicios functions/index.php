<?php

function potenciacao($numero, $potencia)
{
    $resultado = $numero;
    for ($i = 1; $i < $potencia; $i++) {
        $resultado = $resultado * $numero;
    }
    return $resultado;
}
echo potenciacao(2, 5);
// $numero = 2; $potencia = 3. a conta vai ser 2 * 2 * 2 = 8