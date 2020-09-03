<?php
session_start();

if ($_SESSION['perfil'] != 1) {
    header("location:../home.php?erro=1");

} else {
    require_once("conexao.php");
    session_start();
    $cod = $_GET['cod'];
    $sql = "DELETE FROM tarefas where 
    cod = $cod";
    $resultado = mysqli_query($con ,$sql);

if ($resultado == true) {
    header("location:../home.php");

}
}
