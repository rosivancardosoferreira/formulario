<?php
    session_start();
    if(!isset($_SESSION['confirma']) || $_SESSION['confirma'] != 'sim') {        
        header('Location: index.php');
    } else {
        unset($_SESSION['confirma']);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/confirma.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <meta name="theme-color" content="#052f55">
    <title>Confirmação de Inscrição de Atividade (SNCT-ITA 2020)</title>
</head>
<body>

    <div class="container">
        <ul class="login">
            <li>
                <h2>Inscrição de atividade realizada com sucesso!</h2>
                <p>Entraremos em contato por e-mail informando possíveis alterações na atividade proposta</p>
            </li>
        </ul>                    
    </div>    
</body>
</html>