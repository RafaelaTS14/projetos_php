<?php

$host = 'localhost';
$db = 'crud_clientes';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    die('falha na conexão com o banco de dados');
}
