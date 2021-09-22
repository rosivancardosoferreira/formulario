<?php
    session_start();
    include('../server/scriptServer.php');
    if(isset($_POST['btn-entrar'])) {
        $chave = $_POST['chave'];                
        if(password_verify($chave, '$2y$10$R6slH33snUHtgzO1gnlQ9uG605Wqkp/S97hlUV4TnVjC4AceEqTYm')) {            
            $_SESSION['acesso']  = 'logado';
            header('Location: ../controle.php');
        } else {            
            unset($_SESSION['acesso']);
            $_SESSION["msg_erro_login"] = "* Senha Inválida";
            header('Location: ../login.php');
        }
    } else {
        $_SESSION["msg_erro_login"] = "* Login necessário.";
        unset($_SESSION['acesso']);
        header('Location: ../login.php');
    }
    
?>