<?php
require_once("conexao.php");

function higienizarNome($nome)
{
    if(filter_var($nome  ,FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH))
    return trim($nome);

}


function higienizarEmail($email)
{
   return filter_var($email ,FILTER_SANITIZE_EMAIL);

}

function validarEmail($email)
{ 
    if (empty($email)) {
        echo "<script type='text/javascript'>alert('e-mail vazio')</script>";
        return false;
    }

    if (false === filter_var($email ,FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'>alert('e-mail invalido')</script>";
        return false;
    }
    
    global $con;
    #Recebe o Email Postado 
    $emailPostado = $email;
    #Conecta banco de dados 
    $sql3 = mysqli_query($con, "SELECT* FROM usuario WHERE email = '{$emailPostado}'");
    #Se o retorno for maior do que zero, diz que já existe um.
    if (mysqli_num_rows($sql3)>0) {
        echo "<script type='text/javascript'>alert('e-mail ja existente')</script>";
        return false;
    }

    return true;
}


function validarNome($nome)
{

    if (empty($nome)) {
        echo "<script type='text/javascript'>alert('O campo nome não pode ser vazio')</script>";
        return false;
    }   

        return true ;
}

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


function Salvar( $nome,$senha,$email,$perfil)
{   
    global $con;
    $sql = "INSERT INTO  usuario (nome, email, senha , perfil_cod) values('$nome' , '$email' , '$senha' , '$perfil')";
    $resultado = mysqli_query($con ,$sql);
    if ($resultado == true) {
        header("location:../index.php");
    }

}