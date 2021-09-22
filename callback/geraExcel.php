<?php 
    include('../server/scriptServer.php');
    $nome_arquivo = 'Planilha-horarios.xls';
    $conn = getConnection();
    $sql = "SELECT a.numero_participantes as numero_participantes,
            a.palestrante1_nome as palestrante1_nome,
            a.palestrante1_instituicao as palestrante1_instituicao,
            a.palestrante1_titulacao as palestrante1_titulacao,
            a.palestrante1_e_mail as palestrante1_e_mail,
            a.palestrante1_celular as palestrante1_celular,
            a.palestrante2_nome as palestrante2_nome,
            a.palestrante2_instituicao as palestrante2_instituicao,
            a.palestrante2_titulacao as palestrante2_titulacao,
            a.palestrante2_e_mail as palestrante2_e_mail,
            a.palestrante2_celular as palestrante2_celular,
            a.palestrante3_nome as palestrante3_nome,
            a.palestrante3_instituicao as palestrante3_instituicao,
            a.palestrante3_titulacao as palestrante3_titulacao,
            a.palestrante3_e_mail as palestrante3_e_mail,
            a.palestrante3_celular as palestrante3_celular,
            a.palestrante4_nome as palestrante4_nome,
            a.palestrante4_instituicao as palestrante4_instituicao,
            a.palestrante4_titulacao as palestrante4_titulacao,
            a.palestrante4_e_mail as palestrante4_e_mail,
            a.palestrante4_celular as palestrante4_celular,
            a.titulo as titulo,
            a.area_conhecimento as area_conhecimento,
            a.tipo_atividade as tipo_atividade,
            a.sugestao_data_horario as sugestao_data_horario,
            a.mensagem as mensagem,
            b.data_atividade_1 as data_atividade_1,
            b.horario_inicio_1 as horario_inicio_1,
            b.horario_final_1 as horario_final_1,
            b.data_atividade_2 as data_atividade_2,
            b.horario_inicio_2 as horario_inicio_2,
            b.horario_final_2 as horario_final_2
            FROM tb_atividade a INNER JOIN tb_data_hora b 
            ON a.cod_data_hora = b.cod_data_hora";
    
    $stmt = $conn->prepare($sql);

    if($stmt->execute()) {
        
        $tipos_atividade = array(
            'PA' => 'Palestra',
            'MC' => 'Minicurso',
            'TCC' => 'Trabalho de Conclusão de Curso',
            'IC' => 'Projeto de Iniciação Científica',
            'EX' => 'Projeto de Extensão'
        );

        $areas_atividade = array(
            'QB' => 'Química e Biologia',
            'FC' => 'Farmácia',
            'AG' => 'Agronomia',
            'ES' => 'Engenharia Sanitária',
            'EP' => 'Engenharia de Produção',
            'MF' => 'Matemática e Física',
            'IM' => 'Informática',
            'EC' => 'Educação',
            'MA' => 'Meio Ambiente e Saúde',
            'AD' => 'Administração', 
            'ECN' => 'Economia e Direito'
        );

        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Pragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"{$nome_arquivo}\"" );
        header ("Content-Description: PHP Generated Data" );
    } else {
        // header('Location: ../index.php');
        echo "Ocorreu um erro ao gerar a planilha";
    }

    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerando Excel</title>
    <style>
        .tabela {
            border-collapse: collapse;            
            border-spacing: 0;
        }
        .tabela th, .tabela td {
            font-family: Calibri, sans-serif !important;
            font-size: 12pt;
            text-align: left;
            font-weight: normal;  
            vertical-align: top;
            word-break: normal;
            padding: 10px 5px;
            color: #000;
        }
        .tabela th {
            background-color: #f2f2f2;            
        }
    </style>
</head>
<body>
    <table class="tabela" border="1">
        <thead>
            <tr>
                <th>Data Início - Dia 1</th>
                <th>Hora Início - Dia 1</th>
                <th>Hora Término - Dia 1</th>
                <th>Data Início - Dia 2</th>
                <th>Hora Início - Dia 2</th>
                <th>Hora Término - Dia 2</th>
                <th>Sugestão de Data e Horário</th>

                <th>Número de Participantes</th>
                
                <th>Nome Palestrante 1</th>
                <th>Instituição Palestrante 1</th>
                <th>Titulação Palestrante 1</th>
                <th>E-mail Palestrante 1</th>
                <th>Celular Palestrante 1</th>

                <th>Nome Palestrante 2</th>
                <th>Instituição Palestrante 2</th>
                <th>Titulação Palestrante 2</th>
                <th>E-mail Palestrante 2</th>
                <th>Celular Palestrante 2</th>

                <th>Nome Palestrante 3</th>
                <th>Instituição Palestrante 3</th>
                <th>Titulação Palestrante 3</th>
                <th>E-mail Palestrante 3</th>
                <th>Celular Palestrante 3</th>
                
                <th>Nome Palestrante 4</th>
                <th>Instituição Palestrante 4</th>
                <th>Titulação Palestrante 4</th>
                <th>E-mail Palestrante 4</th>
                <th>Celular Palestrante 4</th>

                <th>Título da Atividade</th>
                <th>Área de Conhecimento</th>
                <th>Tipo de Atividade</th>
                
                <th>Mensagem</th>
            </tr>
        </thead>
        <tbody>        
            <?php while($dados_atividade = $stmt->fetch(PDO::FETCH_OBJ)) { ?>        
            <tr>
                <td><?=$dados_atividade->data_atividade_1?></td>
                <td><?=$dados_atividade->horario_inicio_1?></td>
                <td><?=$dados_atividade->horario_final_1?></td>
                <td><?=$dados_atividade->data_atividade_2?></td>
                <td><?=$dados_atividade->horario_inicio_2?></td>
                <td><?=$dados_atividade->horario_final_2?></td>

                <td><?=$dados_atividade->sugestao_data_horario?></td>

                <td><?=$dados_atividade->numero_participantes?></td>
                <td><?=$dados_atividade->palestrante1_nome?></td>
                <td><?=$dados_atividade->palestrante1_instituicao?></td>
                <td><?=$dados_atividade->palestrante1_titulacao?></td>
                <td><?=$dados_atividade->palestrante1_e_mail?></td>
                <td><?=$dados_atividade->palestrante1_celular?></td>
                <td><?=$dados_atividade->palestrante2_nome?></td>
                <td><?=$dados_atividade->palestrante2_instituicao?></td>
                <td><?=$dados_atividade->palestrante2_titulacao?></td>
                <td><?=$dados_atividade->palestrante2_e_mail?></td>
                <td><?=$dados_atividade->palestrante2_celular?></td>
                <td><?=$dados_atividade->palestrante3_nome?></td>
                <td><?=$dados_atividade->palestrante3_instituicao?></td>
                <td><?=$dados_atividade->palestrante3_titulacao?></td>
                <td><?=$dados_atividade->palestrante3_e_mail?></td>
                <td><?=$dados_atividade->palestrante3_celular?></td>
                <td><?=$dados_atividade->palestrante4_nome?></td>
                <td><?=$dados_atividade->palestrante4_instituicao?></td>
                <td><?=$dados_atividade->palestrante4_titulacao?></td>
                <td><?=$dados_atividade->palestrante4_e_mail?></td>
                <td><?=$dados_atividade->palestrante4_celular?></td>
                <td><?=$dados_atividade->titulo?></td>

                <td><?=$areas_atividade[$dados_atividade->area_conhecimento]?></td>
                <td><?=$tipos_atividade[$dados_atividade->tipo_atividade]?></td>

                <td><?=$dados_atividade->mensagem?></td>
            </tr>
            <?php } ?>        
        <tbody>        
    </table>
</body>
</html>
