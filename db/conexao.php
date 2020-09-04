<?php
$site = "localhost/tarefas/";
global $con;
$con = mysqli_connect('127.0.0.1', 'root', 'root1234','controle','3307');
if (!$con) {
    die('Não foi possível conectar:');
}
//mysqli_close($conexao);
