//aula de while

<?php

$i = 0;
$tam = 10;
$vet = [$tam];

while ($i < $tam) {
    $i++;
    echo "Valor da variável i: " . $i . "<br>";
}
echo "<br><hr></br>";

$i = 0;
while ($i < $tam) {
    $vet[$i] = $i;
    $i++;
}

$i = 0;

while ($i < $tam) {
    echo "$vet[$i]<br>";
    $i++;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While</title>
</head>

<body>

</body>

</html>