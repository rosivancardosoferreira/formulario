<?php
include('callback/realizarConsulta.php');
$consulta = resumoCadastroAtividades();
// $numeros = [$area, $palestra, $minicurso, $trabalhoConclusao, $projetoIniciacao, $projetoExtensao];
// echo ($consulta[1][0]);
// echo count($consulta);
// echo count($consulta[0]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Consultas</title>
    <meta charset="UTF-8">
    <meta name="author" content="Josilene Silva - josilenevitoriasilva@gmail.com; Rosivan Cardoso - rosivancardoso767@gmail.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet"> 
    <link href="//db.onlinewebfonts.com/c/b253047fcc20527ddf4202eef7e4db15?family=PrometoW02-Bold" rel="stylesheet" type="text/css"/>         
    <link rel="stylesheet" type="text/css" href="styles/consultas.css">        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#052f55">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
</head>
<body>
    <div class="cabecalho">
        <a href="http://www.sncticet.ufam.edu.br/"> XIV SNCT Itacoatiara</a> 
    </div>
    
    <div class="principal">
        <h1>Contagem de Atividades Cadastradas</h1>  
        <hr class="linha">
        <div class="dados">        
        <?php for($vetor_area = 0; $vetor_area < count($consulta); $vetor_area++) { ?>
            <ul>
                <li><h2><?=$consulta[$vetor_area][0]?></h2></li>
                <li>Palestra: <?=$consulta[$vetor_area][1]?></li>
                <li>Minicursos: <?=$consulta[$vetor_area][2]?></li>
                <li>Trabalhos de Conclusão de Curso: <?=$consulta[$vetor_area][3]?></li>
                <li>Projetos de Iniciação Científica: <?=$consulta[$vetor_area][4]?></li>
                <li>Projetos de Extensão: <?=$consulta[$vetor_area][5]?></li>
                <li>Total de Atividades Cadastradas: <?=((int)$consulta[$vetor_area][0]+(int)$consulta[$vetor_area][1]+(int)$consulta[$vetor_area][2]+(int)$consulta[$vetor_area][3]+(int)$consulta[$vetor_area][4]+(int)$consulta[$vetor_area][5])?></li>
            </ul>
        <?php } ?>        
        </div>
    </div>        
</body>
</html>