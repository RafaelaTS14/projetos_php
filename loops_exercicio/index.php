<?php
$notas_dos_alunos = [
    '7.4', '1.7', '8.5', '3.5', '4.4', '8.7', '6.4', '8.4', '1.2', '4.3', '9.8', '0.5', '8.2',
    '4.7', '1.1', '3.3', '3.4', '4.8', '8.7', '5.4', '2.2', '3.7', '5.9', '7.4', '4.8', '4.7', '1.5', '8.4', '2.1', '2.7'
];
$i = 0;
$aprovados = 0;
$reprovados = 0;
foreach ($notas_dos_alunos as $i => $notas) {
    if ($notas >= 6) {
        echo $notas . " - Aprovado!" . "<br>";
        $aprovados += 1;
    } else {
        echo $notas . " - Reprovado!" . "<br>";
        $reprovados += 1;
    }
}
echo "O total de alunos aprovados é de: " . $aprovados . "<br>";
echo "O total de alunos reprovados é de: " . $reprovados . "<br>";
