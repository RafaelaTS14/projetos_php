<?php

/*echo time();

echo strtotime("2020 - 02 - 21");

echo date("d/m/Y", strtotime("1970-01-01"));
*/

//Mostrar a data atual em timestamp

echo "<p>Mostrar data atual em timestamp: " . time() . "</p>";

//Transformar timestamp em data atual

echo "<p>Transformar timestamp em data atual: " . date("d/m/Y", time()) . "</p>";

//transformar data atual em timestamp

echo "<p>Transformar data atual em timestamp: " . strtotime("2023-05-22") . "</p>";

//Somar 10 dias em uma data

$data = "2023-05-22";
$nova_data = strtotime($data) + (86400 * 10);
echo "<p>Somar 10 dias em uma data: " . date("d/m/Y", $nova_data) . "</p>";

//Subtrair 10 dias em uma data

$data = "2023-05-22";
$nova_data = strtotime($data) - (86400 * 10);
echo "<p>Subtrair 10 dias em uma data: " . date("d/m/Y", $nova_data) . "</p>";

//Convertendo o timestamp para o banco de dados

echo "<p>Convertendo o timestamp para o banco de dados: " . date("Y-m-d H:i:s", time()) . "</p>";

//Descobrir o dia da semana de uma data

echo "<p>Descobrir o dia da semana de uma data: " . date("D", $nova_data) . "</p>";
