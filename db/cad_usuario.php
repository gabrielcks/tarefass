<?php
require_once("conexao.php");
//Inclui o arquivo que contém a função criada
include 'funcao_v.php';
//Recebe os dados do form e armazena nas variáveis
$nome = higienizarNome(trim($_POST['nome']));
$senha = $_POST['senha'];
$email = higienizarEmail(trim(@$_REQUEST['email']));
$perfil = 2;

if (validarNome($nome) && validarSenha($senha) && validarEmail($email)) {
    Salvar( $nome,md5($senha),$email,$perfil);
}

