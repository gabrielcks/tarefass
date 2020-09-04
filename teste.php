<?php
require_once("db/conexao.php");

function validarSenha($senha)
{
    
    
    if (strlen($senha) < 8 ) {
        echo "<script>  alert('o campo senha deve conter no minimo 8 caracteres ') </script>";
        return false ; 
    }   if(!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $senha)){ 
        echo "<script>  alert('o campo senha deve conter Contém pelo menos uma letra e um número ') </script>";
        return false ;
    }
    return true ;      
}


var_dump(validarSenha('12345678av'));