<?php
require_once('bloqueio.php');
$sql="SELECT* FROM categoria";
$result_cat= mysqli_query($con,$sql);

$cod=$_GET['cod'];
$sql2="SELECT* FROM tarefas where cod = $cod ";
$result_tarefas= mysqli_query($con, $sql2);
$tarefa = mysqli_fetch_array($result_tarefas);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edição de tarefa</title>
</head>
<body>
<?php
        require_once("header.php");
    ?>
    <h3 style="text-align: center;" class="indigo-text darken-3">Editar tarefa</h3>
    <div class="row">
    <form class="row" action="db/edit_tarefa.php" method="POST">
    <div class="row">
    <div class="input-field col offset-m3 m6 s6">   
        <input type="hidden" name="cod" value="<?=$tarefa['cod']?>">
    </div>
    <div class="input-field col offset-m3 m6 s6">  
        Titulo
        <input type="text" name="titulo" value="<?=$tarefa['titulo'] ?>"> </br>
    </div>
    <div class="input-field col offset-m3 s2">
        Data
        <input type="date" name="data" value="<?=$tarefa['data'] ?>"> </br>
    </div>
    <div class="input-field col offset-m3 s1">
        Hora
        <input type="time" name="hora" value="<?=$tarefa['hora'] ?>"> </br>
    </div>
    <div class="input-field col offset-m3 s2">
            Categoria
            <select name="categoria" > </br>
                <?php
                    foreach($result_cat as $dados){ ?>
                    <option value="<?php echo $dados ['cod'] ?>"
                        <?php
                            if($dados ['cod'] == $tarefa['categoria_cod']){
                                echo "selected";

                            }

                        ?>
                    >
                    <?php echo $dados ['nome']?>
                    </option>
                    <?php }  ?>


            </select></br></br>
    </div>
    <div class="input-field col offset-m3 m6 s12">
            Descrição
            <textarea name="descricao"  id="" cols="30"  rows="10" ><?=$tarefa['descricao']?></textarea></br>
            <button  class="waves-effect waves-light btn indigo darken-1
        ">Salvar</button>
    </div>
    </div>
    </form>
    </div>
</body>
</html>