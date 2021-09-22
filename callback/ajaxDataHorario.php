<?php
    session_start();
    include('../server/scriptServer.php');
    unset($_SESSION['cod_data_hora']);

    if(isset($_POST['area_conhecimento']) && isset($_POST['tipo_atividade'])) {
        $area_atividade = $_POST['area_conhecimento'];
        $tipo_atividade = $_POST['tipo_atividade'];       

        $sql = "SELECT * FROM tb_data_hora WHERE area_atividade = ? AND tipo_atividade = ? AND checked = 'N' ORDER BY data_atividade_1 ASC, horario_inicio_1 ASC";
        $conn = getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $area_atividade);
        $stmt->bindValue(2, $tipo_atividade);        
        $cont = 0;
        if(($stmt->execute()) && ($stmt->rowCount() > 0)) { ?>
            
            <strong id="stg-data">Sugestão de Data e Horário Para a Realização da Atividade</strong>
            <p style="margin-bottom: 10px;">(Essa sugestão pode sofrer alteração. Entraremos em contato por e-mail)</p>
            <p style="color: red;"><?=isset($_SESSION['perdeuVez'])? $_SESSION['perdeuVez'] : '' ?></p>
         <?php while($data_hora = $stmt->fetch(PDO::FETCH_OBJ) ){
                if($tipo_atividade == 'MC') { ?>
                    <input type="radio" name="data_hora" id="<?=$cont?>" onclick="sugestaoDataHorario()" value="<?=$cont?>">
                    <label for= "<?=$cont?>"><?='Dias '.date_format(date_create($data_hora->data_atividade_1), 'd/m/Y').' e '.date_format(date_create($data_hora->data_atividade_2), 'd/m/Y').' das '.substr($data_hora->horario_inicio_1, 0, -3).' às '.substr($data_hora->horario_final_1, 0, -3)?></label>
            <?php } else { ?>
                    <input type="radio" name="data_hora" id="<?=$cont?>" onclick="sugestaoDataHorario()" value="<?=$cont?>">
                    <label for= "<?=$cont?>"><?='Dia '.date_format(date_create($data_hora->data_atividade_1), 'd/m/Y').' de '.substr($data_hora->horario_inicio_1, 0, -3).' às '.substr($data_hora->horario_final_1, 0, -3)?></label>
            <?php }             
                $_SESSION['cod_data_hora'][$cont] = $data_hora->cod_data_hora;
                $cont++;
            }?>
            <input type="radio" name="data_hora" id="noInfo" onclick="sugestaoDataHorario('S')" value="" >
            <label for="noInfo">Minha sugestão é:</label>
            <input type="text" name="sugestao_data_horario" id="sugestao_data_horario" class="sugestao-data-horario" placeholder="<?=$tipo_atividade == 'MC'?'Dias dd/12/2020 e dd/12/2020 das hh:mm às hh:mm': 'Dia dd/12/2020 das hh:mm às hh:mm'?>">
            <p class="msg-obg" id="msg-radio">* Campo obrigatório</p>
        <?php } else { ?>
            <p style="color: red;"><?=isset($_SESSION['perdeuVez'])? 'Este horário não está mais disponível, escolha outro horário ou, caso não haja mais nenhum, apenas confirme a inscrição da atividade clicando no botão "Enviar" que verificaremos a disponibilidade de data e horário para sua atividade' : '' ?></p>
        <?php }
        unset($_SESSION['perdeuVez']);
    }
?>