<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/materialize/css/materialize.min.css">
    <title>cadastro do usuario</title>
</head>
<body>

    <h5 class="indigo-text darken-3" style="text-align: center;">Cadastro de Usuario</h5>

<div class="row">
            <form  class="col s12" action="db/cad_usuario.php" method="POST">
            <div class="row">
 
            <div class="input-field col offset-s3 s6">
                <label>Nome</label>
                <input type="text" name="nome">
            </div>
            <div class="input-field col offset-s3 s6">
                <label>E-mail</label>
                <input type="email" name="email">
            </div>
            <div class="input-field col offset-s3 s6">
                <label>Senha</label>
                <input type="password" name="senha" id="senha" onkeyup="validasenha()">
            </div>
            <div class="input-field col offset-s3 s6">
                <label>Confirmação de senha</label>
                <input type="password" name="senha2" id="senha2" onkeyup="validasenha()">
            
                <button class="waves-effect waves-light btn indigo darken-3
">cadastrar</button>
                <a href="index.php">Voltar</a>
            </div>
            </div>
              </form> 
</div>
    <script>
       function validasenha(){
            $senha = document.getElementById("senha").value;
            $senha2 =  document.getElementById("senha2").value;
            if($senha != $senha2){
                $senha2 =  document.getElementById("senha2").style.border = "red 1px solid";
            }else{
                $senha2 =  document.getElementById("senha2").style.border = "green 1px solid"

            }
        }
        function senha(){
            $senha = document.getElementById("senha").values;
                if($senha == ""){
                    print_r ("Preencha o campo Senha")
                }
        }
    </script>
    <script src="assets/materialize/js/materialize.min.js"></script>
<?php require_once('footer.php');?>