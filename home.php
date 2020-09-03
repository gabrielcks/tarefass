<?php
require_once('bloqueio.php');
$cod =$_SESSION['cod'];

if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
} else {
    $busca = '';
} if ($_SESSION['perfil'] != 1) {
    $sql = "SELECT* , t.cod as codt FROM tarefas t where usuario_cod = $cod AND (titulo like'$busca' OR descricao like '%$busca%') order by data, hora asc ";
} else {
    $sql = "SELECT* ,u.cod as codu , t.cod as codt FROM tarefas t, usuario u  WHERE t.usuario_cod = u.cod AND (titulo like'$busca' OR descricao like '%$busca%') order by data, hora asc ";
}

$result_tarefas= mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>tarefas diarias</title>
</head>
<body>
    <?php
        require_once("header.php");
    ?>
        <main class="container">
                <form action="" class="row">
                    <div class="input-field col s10">
                        <label for="busca">Pesquise aqui pelo titulo ou descrição</label>
                        <input type="text" name="busca" id="busca">
                    </div>
                    <div class="input-field col s2">
                        <button class="waves-effect waves-light btn indigo darken-3
                        "><i class="tiny material-icons">search</i></button>
                    </div>
                </form>
                <table class="responsive-table highlight" border="1">
                    <thead>
                        <tr>
                            <?php
                                if($_SESSION['perfil'] == 1){?>
                                <th>usuario</th></th> <?php } ?>
                                <th>Titulo</th>
                                <th class="hide-on-small-only">Data</th>
                                <th class="hide-on-small-only">Hora</th>
                                <th class="hide-on-small-only">Categoria</th>
                                <th>Opções</th>
                            </tr>
                            </thead>       
                            <?php
                                foreach ($result_tarefas as $tarefa) {?>
                            <tr>    
                                <?php
                                if ($_SESSION['perfil'] == 1) {?>
                                <td><?= $tarefa['nome']?></td> <?php } ?>
                                <td><a href="visualizar_tarefa.php?cod=<?= $tarefa['codt']?>"> <?= $tarefa['titulo']?></a></td>
                                <td class="hide-on-small-only"><?= date("d/m/y", strtotime($tarefa['data']))?></td>
                                <td class="hide-on-small-only"><?= $tarefa['hora']?></td>
                                <?php 
                                $cod_tarefa = $tarefa['categoria_cod'];
                                $sql="SELECT* FROM categoria WHERE cod =$cod_tarefa ";
                                $result_cat= mysqli_query($con,$sql);
                                $cat_tarefa = mysqli_fetch_array($result_cat);
                                ?>
                                <td class="hide-on-small-only"><?= $cat_tarefa['nome']?></td>
                            <td>
                                <a href="editar_tarefa.php?cod=<?= $tarefa['codt']?>"><i class=" material-icons">edit</i></a>
                                <?php
                                    if($_SESSION['perfil'] == 1){?>
                                <a href="db/excluir_tarefa.php?cod=<?= $tarefa['codt']?>"><i class=" material-icons">delete_forever</i></a>
                                <?php }  ?>  </td> 
                            </tr>
                            <?php } ?>
                </table>
        </main>
<?php require_once('footer.php');?>
