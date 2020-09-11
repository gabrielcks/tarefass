<?php
require_once("db/conexao.php");



function consultarUsuario ($email)
{
    
    global $con;
    #Recebe o Email Postado 
    $emailPostado = $email;
    #Conecta banco de dados 
    $sql3 = mysqli_query($con, "SELECT* FROM usuario WHERE email = '{$emailPostado}'");
    return mysqli_fetch_array($sql3);
  
}

function validarEmail($email)
{ 

    if (empty($email)) {
        echo "msg1<br>";
        throw new Exception("E-mail vazio");
        return false;
    }

    if (false === filter_var($email ,FILTER_VALIDATE_EMAIL)) {
        echo "msg2<br>";
        throw new Exception("E-mail e invalido");
        return false;
    }
    
    $dadosDoUsuario = consultarUsuario($email); 
    var_dump($dadosDoUsuario);
     if (!empty($dadosDoUsuario)) {
        
        throw new Exception("E-mail ja existente");
        return false;
    }

    return true;
    echo "tudo certo<br>";
}


function validarNome($nome)
{

    if (empty($nome)) {
        throw new Exception("O campo Nome não pode ser vazio");
        return false;
    }    
    
    if (strlen($nome) < 4 ) {
        throw new Exception("O campo Nome deve conter no minimo 4 caracteres");
        return false ; 
    }
    
    if (filter_var($nome, FILTER_SANITIZE_NUMBER_INT)) {
        throw new Exception("O campo Nome deve conter apenhas letras");
        return false;
    }
        return true ;
}

function validarSenha($senha)
{
    
    if (strlen($senha) < 8 ) {
        throw new Exception("O campo senha deve conter no minimo 8 caracteres");
        return false ; 
    } 

    if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $senha)) { 
        throw new Exception("O campo senha deve conter pelo menos uma letra e um numero"); 
        return false ;
    }
    return true ;      
}



function validarFormulario($email , $nome, $senha, $perfil){


    try {
        validarEmail($email);
        validarNome($nome);
        validarSenha($senha);

        } catch (Exception $e) {
            if (validarNome($nome) && validarSenha($senha) && validarEmail($email) !== true) {
                
                return false ;
            } else {
                
                Salvar( $nome,md5($senha),$email,$perfil);
                return true;
            }
            var_dump($e->getMessage());

        }
        
}
validarFormulario('luisa.ck@hotmail.com','jooooa' , '12445332a',2 );
