<?php
session_start();
require_once("conexao.php");


$titulo = $_POST['titulo'];
$data = $_POST['data'];
$hora =  $_POST['hora'];
$descricao = $_POST['descricao'];
$cod = $_POST['cod'];
$categoria = $_POST['categoria'];

$sql = "UPDATE tarefas SET   
            titulo ='$titulo',  
            data = '$data' ,  
            hora= '$hora' ,                                       
            descricao='$descricao',                 
            categoria_cod='$categoria'  
            WHERE
            cod = $cod";

$resultado = mysqli_query($con ,$sql);
if($resultado == true){
    header("location:../home.php");

}



?>