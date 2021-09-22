<?php
    session_start();
    unset($_SESSION['cod_data_hora']);
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <title>Inscrição de Atividades (SNCT-ITA 2020)</title>
    <meta charset="UTF-08">
    <meta name="author" content="Josilene Silva - josilenevitoriasilva@gmail.com; Rosivan Cardoso - rosivancardoso767@gmail.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">         
    <link rel="stylesheet" type="text/css" href="styles/index.css">        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#052f55">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
</head>

<body>
    <div class="cabecalho">
        <img src="images/bar_2.png">            
    </div>
    
    <div class="container">        
    
        <div class="abas">
            <ul>
                <li class="selected" id="ab1">Apresentação</li>
                <li  id="ab2">Inscrição de Atividade</li>
            </ul>                               
            <p style="color: red; margin: 1% 0px 0px 10%;"><?php if(isset($_SESSION['inserir'])) { $_SESSION['inserir']; unset($_SESSION['inserir']); }?></p>                
        </div>

        <div class="texto-apresentacao" id="texto-apresentacao">
            <p>                        
                Prezado(a),<br><br>
                Agradecemos sua participação e apoio para que a realização da SNCT-ITA 2020 seja mais um marco, democratizando oportunidades de discussão em torno de temas e atividades de Ciência e Tecnologia, valorizando a criatividade, a atitude científica, a inovação e a comunicação.<br><br>
                Informamos que esta submissão de atividade não configura aceitação imediata da proposta, pois temos um quantitativo a ser aceito (devido ao evento ser remoto), e caso seja superior, será dada preferência à atividade com a temática mais aproximada do tema central do evento.<br><br>
                <strong>Site:</strong> <a href="http://www.sncticet.ufam.edu.br" target="_blank">www.sncticet.ufam.edu.br</a><br>
                <strong>E-mail:</strong> sncticet@ufam.edu.br<br><br>
                <strong>Atividades Programadas:</strong> <br>
                &#9684; Palestras: De 50 minutos<br>
                &#9684; Minicursos: De 4 horas, sendo 2 horas por dia<br>
                &#9684; Trabalhos de Conclusão de Curso: De 20 minutos<br>
                &#9684; Projetos de Iniciação Científica: De 20 minutos<br>
                &#9684; Projetos de Extensão: De 20 minutos<br><br>
                &#9782; Formulário disponível até dia 12/10/2020 (Obs.: preencha um formulário por atividade)<br>
            </p>
            <button class="btn-avancar" id="btn-avancar">Inscrição</button>
        </div>

        <div class="inscricao" id="inscricao">
        <form method="POST" id="formulario">            
            <ul>
                <li>  
                    <strong>Dados do(s) Palestrante(s)</strong>                  
                    <p>Número de Palestrantes</p>
                    <select name="numero_participantes" id="numero-palestrantes" class="select-numero-participantes">                            
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>                            
                    </select>                       
                    <p class="msg-obg-selects">* Campo obrigatório</p>                            
                </li> 
                <!-- Parcipantes Início -->
                <div class="palestrantes visible">                    
                    <li>                            
                        <strong>Dados do Palestrante 1</strong>
                        <p>Nome</p>
                        <input type="text" name="palestrante1_nome" class="campo-obg" maxlength="99"/>
                        <p class="msg-obg">* Campo obrigatório</p>                            
                    </li>
                    <li>                                                        
                        <p>Instituição</p>
                        <input type="text" name="palestrante1_instituicao" class="campo-obg" maxlength="99" placeholder="Sigla e nome por extenso"/>
                        <p class="msg-obg">* Campo obrigatório</p>                            
                    </li>                        
                    <li>
                        <p>Titulação</p>                        
                        <select name="palestrante1_titulacao" class="select-titulacao-convidado" id="titleOne">
                            <option value="" selected="selected">Selecione</option>
                            <option value="Ensino Médio">Ensino Médio</option>
                            <option value="Tecnólogo">Tecnólogo</option>
                            <option value="Bacharelado">Bacharelado</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select>
                        <p class="msg-obg-selects">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>E-mail</p>
                        <input type="text" name="palestrante1_e_mail" class="campo-obg" maxlength="99"/>
                        <p class="msg-obg">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>Celular</p>
                        <input type="text" name="palestrante1_celular" class="campo-obg" maxlength="99" placeholder="Com o DDD"/>
                        <p class="msg-obg">* Campo obrigatório</p>                            
                    </li>
                </div>

                <div class="palestrantes">                    
                    <li>
                        <strong>Dados do Palestrante 2</strong>
                        <p>Nome</p>
                        <input type="text" name="palestrante2_nome" class="campo-participante" maxlength="99"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                    <li>                                                        
                        <p>Instituição</p>
                        <input type="text" name="palestrante2_instituicao" class="campo-participante" maxlength="99" placeholder="Sigla e nome por extenso"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>Titulação</p>                        
                        <select name="palestrante2_titulacao" class="select-titulacao-convidado" id="titleTwo">
                            <option value="" selected="selected">Selecione</option>
                            <option value="Ensino Médio">Ensino Médio</option>
                            <option value="Tecnólogo">Tecnólogo</option>
                            <option value="Bacharelado">Bacharelado</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select>                            
                        <p class="msg-selects">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>E-mail</p>
                        <input type="text" name="palestrante2_e_mail" class="campo-participante" maxlength="99"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>Celular</p>
                        <input type="text" name="palestrante2_celular" class="campo-participante" maxlength="99" placeholder="Com o DDD"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                </div>

                <div class="palestrantes">                    
                    <li>
                        <strong>Dados do Palestrante 3</strong>
                        <p>Nome</p>
                        <input type="text" name="palestrante3_nome" class="campo-participante" maxlength="99"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                    <li>                                                        
                        <p>Instituição</p>
                        <input type="text" name="palestrante3_instituicao" class="campo-participante" maxlength="99" placeholder="Sigla e nome por extenso"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>Titulação</p>                        
                        <select name="palestrante3_titulacao" class="select-titulacao-convidado" id="titleThree">
                            <option value="" selected="selected">Selecione</option>
                            <option value="Ensino Médio">Ensino Médio</option>
                            <option value="Tecnólogo">Tecnólogo</option>
                            <option value="Bacharelado">Bacharelado</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select>
                        <p class="msg-selects">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>E-mail</p>
                        <input type="text" name="palestrante3_e_mail" class="campo-participante" maxlength="99"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>Celular</p>
                        <input type="text" name="palestrante3_celular" class="campo-participante" maxlength="99" placeholder="Com o DDD"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                </div>

                <div class="palestrantes">                    
                    <li>
                        <strong>Dados do Palestrante 4</strong>
                        <p>Nome</p>
                        <input type="text" name="palestrante4_nome" class="campo-participante" maxlength="99"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                    <li>                                                        
                        <p>Instituição</p>
                        <input type="text" name="palestrante4_instituicao" class="campo-participante" maxlength="99" placeholder="Sigla e nome por extenso"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>Titulação</p>                        
                        <select name="palestrante4_titulacao" class="select-titulacao-convidado" id="titleFour">
                            <option value="" selected="selected">Selecione</option>
                            <option value="Ensino Médio">Ensino Médio</option>
                            <option value="Tecnólogo">Tecnólogo</option>
                            <option value="Bacharelado">Bacharelado</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select>
                        <p class="msg-selects">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>E-mail</p>
                        <input type="text" name="palestrante4_e_mail" class="campo-participante" maxlength="99"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                    <li>
                        <p>Celular</p>
                        <input type="text" name="palestrante4_celular" class="campo-participante" maxlength="99" placeholder="Com o DDD"/>
                        <p class="msg">* Campo obrigatório</p>                            
                    </li>
                </div>  
                <!-- Parcipantes Fim -->
                <li>
                    <strong>Dados da Atividade</strong>
                    <p>Tipo de Atividade</p>
                    <select name="tipo_atividade" id="" class="select-tipo-atividade">
                        <option value="" selected="selected">Selecione</option>
                        <option value="MC">Minicurso</option>
                        <option value="PA">Palestra</option>
                        <option value="EX">Projeto de Extensão</option>
                        <option value="IC">Projeto de Iniciação Científica</option>
                        <option value="TCC">Trabalho de Conclusão de Curso</option>
                    </select>
                    <p class="msg-obg-selects">* Campo obrigatório</p>                            
                </li>                   
                <li>
                    <p>Área de Conhecimento</p>
                    <select name="area_conhecimento" id="" class="select-area-conhecimento">                            
                        <option value="" selected="selected">Selecione</option>
                        <option value="AD">Administração</option>
                        <option value="AG">Agronomia</option>
                        <option value="QB">Biologia</option>
                        <option value="ECN">Direito</option>
                        <option value="ECN">Economia</option>
                        <option value="EC">Educação</option>
                        <option value="EP">Engenharia de Produção</option>
                        <option value="ES">Engenharia Sanitária</option>
                        <option value="FC">Farmácia</option>
                        <option value="MF">Física</option>
                        <option value="IM">Informática</option>
                        <option value="MF">Matemática</option>
                        <option value="MA">Meio Ambiente</option>
                        <option value="QB">Química</option>
                        <option value="MA">Saúde</option>
                    </select>
                    <p class="msg-obg-selects">* Campo obrigatório</p>                            
                </li>
                <li>
                    <p>Título da Atividade</p>
                    <input type="text" name="titulo" class="campo-obg" maxlength="99"/>
                    <p class="msg-obg">* Campo obrigatório</p>        
                </li> 
                <li>
                    <p>Deixe aqui uma mensagem, caso seja de seu interesse</p>
                    <input type="text" name="mensagem" placeholder="Exemplo: Os participantes deverão ter o AutoCAD instalado" maxlength="99"/>
                </li>
                <li id="dados-horario">
                    <!-- <div id="datas_horarios">
                    </div> -->
                </li>                    
                <input type="submit" name="btn_enviar" value="Enviar" id="btn-enviar" class="btn-enviar" maxlength="99"/>
            </ul> 
        </form>                   
        </div>            
        <div class="rodape">
            <p>Desenvolvido pelos Discentes <a href="https://www.linkedin.com/in/josilene-v-s-silva-634211156/" target="_blank">Josilene Silva</a> e <a href="https://www.linkedin.com/in/rosivan-cardoso-ferreira-6673711b1/" target="_blank">Rosivan Cardoso</a> do Curso de Sistemas de Informação do ICET/UFAM</p>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>    
<script src="javascript/index.js"></script>
</body>
</html>