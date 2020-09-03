<?php
require_once('bloqueio.php');
$sql = "SELECT* FROM categoria";
$result_cat = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de tarefa</title>
</head>
<body>
    <?php
        require_once("header.php");
    ?>
    
        <h3 style="text-align: center;" class="indigo-text darken-3">Cadastro de tarefas</h3>
            <div class="row">
                <form  class="row" action="db/cad_tarefa.php" method="POST">
                    <div class="row">
                            <div class="input-field col offset-m3 m6 s6">
                                Titulo:
                                <input type="text" name="titulo">
                            </div>
                            <div class="input-field col offset-m3 s2">
                                Data:
                                <input type="date" name="data">
                            </div></br>
                            <div class="input-field col offset-m3 s1">
                                Hora:
                                <input type="time" name="hora" >
                            </div>
                            <div class="input-field col offset-m3 s2">
                                Categoria:
                                <select name="categoria" > 
                                                    <?php
                                foreach($result_cat as $dados){ ?>
                                <option value="<?php echo $dados ['cod'] ?>"><?php echo $dados ['nome']?></option>
                                <?php }  ?>
                                </select>
                            </div>
                            </div>
                            <div class="input-field col offset-m3 m6 s12">
                                Descrição:
                                <textarea name="descricao"  id="" cols="30"  rows="10"></textarea></br>
                                <button>cadastrar</button>
                            </div>
                    </div>
                </form>
            </div>
    <?php require_once('footer.php');?>