<?php
require_once("db/conexao.php");


function consultarUsuario ($email){
    
    global $con;
    #Recebe o Email Postado 
    $emailPostado = $email;
    #Conecta banco de dados 
    $sql3 = mysqli_query($con, "SELECT* FROM usuario WHERE email = '{$emailPostado}'");
    return mysqli_fetch_array($sql3);
    #Se o retorno for maior do que zero, diz que já existe um.
}
var_dump(consultarUsuario('gabriel.ck@hotmail.com'));