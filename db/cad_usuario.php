<?php

require_once("conexao.php");

//Inclui o arquivo que contém a função criada
include 'funcao_v.php';

//Recebe os dados do form e armazena nas variáveis
$nome = trim($_POST['nome']);
$senha =$_POST['senha'];
$perfil = 2;
$email = trim(@$_REQUEST['email']);

if ($email) {
    if (preg_match("/[A-Za-z0-9_.-]+@([A-Za-z0-9_]+\.)+[A-Za-z]{2,4}/i", $email)) {

       
//Cria um array com as variáveis recebida do form
$campos = array($nome, $email, $senha,$perfil);

//Executa a função
testaCampos($campos);

    
if(isset($_POST['email'])){ 

    #Recebe o Email Postado
    $emailPostado = $_POST['email'];

    #Conecta banco de dados 
    
$sql3 = mysqli_query($con, "SELECT* FROM usuario WHERE email = '{$emailPostado}'");

    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($sql3)>0) 
    echo "<script type='text/javascript'>alert('e-mail ja existente')</script>";
        else{

$sql = "INSERT INTO  usuario (nome, email, senha , perfil_cod) values('$nome' , '$email' , 'md5($senha)' , '$perfil')";
$resultado = mysqli_query($con ,$sql);

if($resultado == true){
    header("location:../index.php");

}
}
}


    } else {

        echo "O e-mail é inválido!";

    }

}

?>