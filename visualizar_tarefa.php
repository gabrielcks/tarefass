<?php
require_once('bloqueio.php');
$sql="SELECT* FROM categoria";
$codu =$_SESSION['cod'];
$result_cat= mysqli_query($con,$sql);

$cod=$_GET['cod'];
if($_SESSION['perfil'] != 1){

    $sql2="SELECT* , t.cod as codt FROM tarefas t where usuario_cod = $codu and cod = $cod ";
}
else{

$sql2="SELECT* ,u.cod as codu , t.cod as codt FROM tarefas t, usuario u  WHERE t.usuario_cod = u.cod and t.cod = $cod  ";
}

$result_tarefas= mysqli_query($con, $sql2);
$tarefa = mysqli_fetch_array($result_tarefas);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Tarefa</title>
</head>
<body>

<?php
        require_once("header.php");
    ?>
    <h3>Tarefa</h3>
    <?php
        if($_SESSION['perfil'] == 1){?>
    Usuario:
    <?=$tarefa['nome'] ?> </br>
        <?php } ?>
    Titulo:
    <?=$tarefa['titulo'] ?> </br>
    Data:
    <?= date("d/m/y", strtotime($tarefa['data']))?></br>
    Hora:
    <?=$tarefa['hora'] ?> </br>
    <?php 
                $cod_tarefa = $tarefa['categoria_cod'];
                $sql="SELECT* FROM categoria WHERE cod =$cod_tarefa ";
                $result_cat= mysqli_query($con,$sql);
                $cat_tarefa = mysqli_fetch_array($result_cat);
    ?>
    Categoria:<td><?= $cat_tarefa['nome']?></td>

    Descrição:<?=$tarefa['descricao']?></textarea></br>
    </form>

</body>
</html>