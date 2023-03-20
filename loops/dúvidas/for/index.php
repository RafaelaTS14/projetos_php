<?php

$i = 0;
$tam = 5;
$vet = [$tam];

for ($i = 0; $i < $tam; $i++) {
    echo "O valor de i é: " . $i . "<br>";
}

"<br>";

for ($i = 0; $i < $tam; $i++) {
    $vet[$i] = 0;
}

for ($i = 0; $i < $tam; $i++) {
    echo "Valor da posição " . $i . " é: " . $vet[$i] . "<br>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop for</title>
</head>

<body>

</body>

</html>