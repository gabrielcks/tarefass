<?php
require_once('bloqueio.php');
$cod =$_SESSION['cod'];
if(isset($_GET['busca'])){
    $busca = $_GET['busca'];
}else{
    $busca = '';
}

if($_SESSION['perfil'] != 1){

    $sql="SELECT* , t.cod as codt FROM tarefas t where usuario_cod = $cod AND (titulo like'$busca' OR descricao like '%$busca%') order by data, hora asc ";
}
else{

$sql="SELECT* ,u.cod as codu , t.cod as codt FROM tarefas t, usuario u  WHERE t.usuario_cod = u.cod AND (titulo like'$busca' OR descricao like '%$busca%') order by data, hora asc ";
}

$result_tarefas= mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tarefas diarias</title>
    <link rel="stylesheet" href="assets/materialize/css/materialize.min.css">
</head>
<body>
<nav>
    <div class="nav-wrapper indigo darken-3">
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <a href="#" class="brand-logo">Sistema de agenda</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><h5>Olá , <?= $_SESSION['nome']?></h5></li>
        <li><a href="cadastro_tarefa.php">cadastrar tarefa</a></li>
        <li><a href="home.php">listar tarefas</a> </li>
        <li><a href="db/sair.php" >sair</a> </br></br></li>
        
      </ul>
    </div>
  </nav>
  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="https://wallpapercave.com/wp/wp1931302.jpg">
      </div>
      <a href="#name"><span class="white-text name"><?= $_SESSION['nome']?></span></a>
    </div></li>
    <li><a href="cadastro_tarefa.php"><i class=" material-icons">add_box</i>cadastrar tarefa</a></li>
        <li><a href="home.php"><i class=" material-icons">list</i>listar tarefas</a> </li>
        <li><a href="db/sair.php" ><i class=" material-icons">exit_to_app</i>sair</a> </br></br></li>
  </ul>
</body>
</html>