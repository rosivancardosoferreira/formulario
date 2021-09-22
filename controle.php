<?php
session_start();
if(!isset($_SESSION['acesso']) && $_SESSION['acesso'] != 'logado'){
    $_SESSION["msg_erro_login"] = "* Login necessário.";
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle</title>
</head>
<body>
    <a href="callback/geraExcel.php">Exportar dados para excel</a>
    <br>
    <a href="cadastrohorario.php">Novos registros</a>
</body>
</html>