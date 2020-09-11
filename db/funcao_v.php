<?php
require_once("conexao.php");


function higienizarSenha($senha)

{
    if (filter_var($senha  ,FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)) {
    return $senha;
    }
}


function higienizarNome($nome)
{
    if (filter_var($nome  ,FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)) {
    return trim($nome);
    }
}


function higienizarEmail($email)
{
   return filter_var($email ,FILTER_SANITIZE_EMAIL);

}
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
        throw new Exception("E-mail vazio",1);
       
    }
    if (false === filter_var($email ,FILTER_VALIDATE_EMAIL)) {
        throw new Exception("E-mail e invalido",2);
      
    }
    
    $dadosDoUsuario = consultarUsuario($email); 
     if (!empty($dadosDoUsuario)) {
        
        throw new Exception("E-mail ja existente",3);
        
    }

    return true;
    echo "tudo certo<br>";
}


function validarNome($nome)
{

    if (empty($nome)) {
        throw new Exception("O campo Nome não pode ser vazio", 4);
        
    }    
    
    if (strlen($nome) < 4 ) {
        throw new Exception("O campo Nome deve conter no minimo 4 caracteres" ,5);
         
    }
    
    if (filter_var($nome, FILTER_SANITIZE_NUMBER_INT)) {
        throw new Exception("O campo Nome deve conter apenhas letras",6);
    
    }
        return true ;
}

function validarSenha($senha)
{
    
    if (strlen($senha) < 8 ) {
        throw new Exception("O campo senha deve conter no minimo 8 caracteres",7);
        
    } 

    if (!preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $senha)) { 
        throw new Exception("O campo senha deve conter pelo menos uma letra e um numero", 8); 
        
    }
    return true ;      
}



function validarFormulario($nome , $senha, $email){
    global $menssagem;

    try {
        validarEmail($email);
        validarNome($nome);
        validarSenha($senha);
        validarNome($nome);

    } catch (Exception $e) {
        $menssagem = $e->getMessage();
        // print($menssagem);
        return false;   
    } 
            
        return true;
                
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