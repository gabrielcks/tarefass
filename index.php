<?php
//session_start();
if (isset($_GET['erro'])) {
    if ($_GET['erro'] == 1) {
        $erro = "Acesso Negado!";
    } else if ($_GET['erro'] ==2) {
        $erro = "usuario ou senha invalidas";
    } else if ($_GET['erro'] ==3) {
        $erro = "logout realizado com sucesso!";
    }
} else {
    $erro = "";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/materialize/css/materialize.min.css">
    <title>Sistema de tarefas</title>
    
</head>
<body>
    <main class="container">
        
        <form action="db/verifica_login.php" method="POST" class="row">
        <div class="col offset-s3 s6">
        <h3 class="indigo-text darken-3">Login</h3>
        </div>
        <div class="input-field col offset-m3 m6 s12">
            <label>Login</label>
            <input type="text" name="login">
        </div>
        <div class="input-field col offset-m3 m6 s12">
            <label>Senha</label>
            <input  type="password" name="senha">
        </div>
        <div class="input-field col offset-m3 m6 s12">
            <?php echo "<span>$erro</span>";?>
            <button class="waves-effect waves-light btn indigo darken-3">enviar</button>
            <div class="divider"></div>
            <a href="cadastro.php">cadastre-se</a>
        </form>
        </div>
    </main>
        <script src="assets/materialize/js/materialize.min.js"></script>
</body>
</html>