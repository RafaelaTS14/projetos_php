<?php

$num1 = 3;
$num2 = 4;

//$resultado = 3 * 4;

$resultado = 0;

for($i = 0; $i < $num2; $i++) {
    $resultado += $num1;
}

echo 'O resultado da multiplicação é: ' . $resultado; /* o ponto é usado
pra concatenar no php */