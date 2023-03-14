<div>
    <p> seu IMC está na faixa de: <b>
            <?php

            //index é o arquivo de entrada

            $altura = 1.80;
            $peso = 80;
            $imc = $peso / ($altura * $altura);
            $faixa ='';

if($imc < 18.5) {
    $faixa = 'Magreza';
} else if ($imc >= 18.5 && $imc <= 24.9){
    $faixa = 'Normal';
} else if ($imc >= 24.9 && $imc <= 30) {
    $faixa = 'Sobrepeso';
} else {
    $faixa ='Obesidade';
}
            echo $faixa;
            ?>
        </b>
</div>