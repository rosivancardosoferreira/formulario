<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <meta name="theme-color" content="#052f55">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="aba">
                <h2>Login</h2>
            </div>
            <form method="POST" id="formulario">
                <ul>
                    <li>
                        <p>Chave de Acesso</p>
                        <input type="password" name="chave" id="chave" autofocus=''/>                        
                        <p class="msg-obg" id="msg-obg">* Preencha esta campo</p>                        
                        <p style="color: red; font-size: 14px; margin-top: 15px;"><?php if(isset($_SESSION["msg_erro_login"])) { echo $_SESSION["msg_erro_login"]; unset($_SESSION["msg_erro_login"]); } else { echo ''; }?></p>
                    </li>
                    <input type="submit" name="btn-entrar" value="Entrar" id="btn-entrar" class="btn-entrar"/>
                </ul>
            </form>
        </div>  
    </div>
</body>
<script src="javascript/login.js"></script>
</html>