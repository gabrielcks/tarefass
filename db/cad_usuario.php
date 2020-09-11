<?php
require_once("conexao.php");
//Inclui o arquivo que contém a função criada
include 'funcao_v.php';
//Recebe os dados do form e armazena nas variáveis
global $menssagem;
$nome = higienizarNome($_POST['nome']);
$senha = higienizarNome($_POST['senha']);
$email = higienizarEmail($_REQUEST['email']);
$perfil = 2;

if (validarFormulario($nome , $senha ,$email,) === true) {
  
    Salvar( $nome,md5($senha),$email,$perfil);
    
} else {
    echo "<script> alert('$menssagem')</script>";
    
}
