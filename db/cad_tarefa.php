<?php
require_once("conexao.php");
session_start();

$titulo = $_POST['titulo'];
$data = $_POST['data'];
$hora =  $_POST['hora'];
$descrição = $_POST['descricao'];
$cod_usuario = $_SESSION['cod'];
$categoria = $_POST['categoria'];

if($titulo == '') {
    echo"Não e possivel cadastrar um tarefa sem titulo";
} else {
    $sql = "INSERT INTO  tarefas (titulo, data, hora , descricao , usuario_cod, categoria_cod ) 
    values('$titulo' , '$data' , '$hora' , '$descrição', '$cod_usuario','$categoria')";
    $resultado = mysqli_query($con ,$sql);
if($resultado == TRUE) {
    header("location:../home.php");
}
}
