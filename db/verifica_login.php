<?php
//conecta ao banco de dados
require_once("conexao.php");
//session_start inicia a sessão
session_start();
//as variaveis login e senha recebem os dados digitados na pagina anterior 
$email = $_POST['login'];
$senha = md5($_POST['senha']);
//a variavel $result pega as variaveis $login e $senha e faz uma pesquisa no banco 
$query = "select* from usuario where email='".$email."' and senha='".$senha."'" ; 

$result=mysqli_query($con, $query);


if(mysqli_num_rows($result) > 0){
    $dados = mysqli_fetch_array($result);
    $_SESSION['cod'] = $dados['cod'];
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['email'] = $dados['email'];
    $_SESSION['perfil'] = $dados['perfil_cod'];
    header('location:http://'.$site.'home.php');
}else{
    echo"<script> alert('loginou senha invalido(a), tente novamente')</script>";
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    echo $login;
    echo $senha;
    header('location:http://'.$site.'index.php?erro=2');


}


?>