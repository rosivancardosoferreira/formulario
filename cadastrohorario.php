<?php
session_start();
if(!isset($_SESSION['acesso']) && $_SESSION['acesso'] != 'logado'){
    $_SESSION["msg_erro_login"] = "* Login necessário.";
    header('Location: login.php');
}
if(isset($_SESSION['msg'])){ ?>
    <p style="font-size: 50px; color: <?=$_SESSION['msg'] == 'sucesso'? 'green' : 'red'?>"><?=$_SESSION['msg']?></p>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="acaoCadastro.php">        
        <p>CHAVE</p>
        <input type="text" name="cod_data_hora" value="<?=date("H:m:s")?>" autofocus="on">

        <p>TIPO ATIIVIDADE</p>
        <select name="tipo_atividade" id="">            
            <option value="PA">Palestra</option>
            <option value="MC">Minicurso</option>
            <option value="TCC">Trabalho de Conclusão de Curso</option>
            <option value="IC" selected>Projeto de Iniciação Científica</option>
            <option value="EX">Projeto de Extensão</option>
        </select>

        <p>AREA ATIIVIDADE</p>        
        <select name="area_atividade" id="">                                        
            <option value="QB">Química e Biologia</option>
            <option value="FC">Farmácia</option>
            <option value="AG">Agronomia</option>
            <option value="ES">Engenharia Sanitária</option>
            <option value="EP">Engenharia de Produção</option>
            <option value="MF">Matemática e Física</option>
            <option value="IM">Informática</option>
            <option value="EC">Educação</option>
            <option value="MA">Meio Ambiente e Saúde</option>
            <option value="AD">Administração</option>
            <option value="ECN">Economia</option>
        </select>
        
        <P>DATA INICIO</P>
        <input type="text" name="data_atividade_1" value="2020-12-11">

        <p>HORARIO INICIO 1</p>
        <input type="text" name="horario_inicio_1" class="masc" oninput="mascara('0')" maxlength="8">

        <p>HORARIO FINAL 1</p>
        <input type="text" name="horario_final_1" class="masc" oninput="mascara('1')" maxlength="8">

        <p>DATA FINAL</p>
        <input type="" name="data_atividade_2" value="">

        <p>HORARIO INICIO 2</p>
        <input type="text" name="horario_inicio_2" class="masc" oninput="mascara('2')" maxlength="8">

        <p>HORARIO FINAL 2</p>
        <input type="text" name="horario_final_2" class="masc" oninput="mascara('3')" maxlength="8">

        <input type="submit" name="cadastrar" value="cadastrar">
    </form>

    <script>
        function mascara(posicao) {            
            let elemento = document.getElementsByClassName('masc')[posicao];
            // let palestrant document.getElementsByClassName('palestrantes');
            if(elemento.value.length === 2){
                console.log('adicionado');
                elemento.value = elemento.value + ':';
            }

            if(elemento.value.length === 5){
                console.log('adicionado');
                elemento.value = elemento.value + ':';
            }

            // if(elemento.value.length === 2){
            //     console.log('adicionado');
            //     elemento.value = elemento.value + ':';
            // }
            

        }        
    </script>
</body>
</html>