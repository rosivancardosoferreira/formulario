<?php
session_start();    
 include('server/scriptServer.php');    

if(isset($_POST['cadastrar'])) {
    cadastrarNovoItem();
}else{
    echo 'Sem função';    
}



function cadastrarNovoItem() {

    $conn = getConnection();
    $cod_data_hora = $_POST['cod_data_hora'];
    $tipo_atividade = $_POST['tipo_atividade'];
    $area_atividade = $_POST['area_atividade'];
    $data_atividade_1 = $_POST['data_atividade_1'];
    $horario_inicio_1 = $_POST['horario_inicio_1'];
    $horario_final_1 = $_POST['horario_final_1'];
    $data_atividade_2 = $_POST['data_atividade_2'];
    $horario_inicio_2 = $_POST['horario_inicio_2'];
    $horario_final_2 = $_POST['horario_final_2'];
    $checked = 'N';

    echo $cod_data_hora.'<br>';
    echo $tipo_atividade.'<br>';
    echo $area_atividade.'<br>';
    echo $data_atividade_1.'<br>';
    echo $horario_inicio_1.'<br>';
    echo $horario_final_1.'<br>';
    echo $data_atividade_2.'<br>';
    echo $horario_inicio_2.'<br>';
    echo $horario_final_2.'<br>';

    $sql = 'INSERT INTO tb_data_hora (cod_data_hora, tipo_atividade, area_atividade, data_atividade_1, horario_inicio_1, horario_final_1, data_atividade_2, horario_inicio_2, horario_final_2, checked) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';    
    $stmt = $conn->prepare($sql);		
    $stmt->bindValue(1,$cod_data_hora);
    $stmt->bindValue(2,$tipo_atividade);
    $stmt->bindValue(3,$area_atividade);
    $stmt->bindValue(4,$data_atividade_1);
    $stmt->bindValue(5,$horario_inicio_1);
    $stmt->bindValue(6,$horario_final_1);
    $stmt->bindValue(7,$data_atividade_2);
    $stmt->bindValue(8,$horario_inicio_2);
    $stmt->bindValue(9,$horario_final_2);        
    $stmt->bindValue(10,$checked);
    

    if ($stmt->execute()) {        
        $_SESSION['msg'] = 'sucesso';
        header('Location: cadastrohorario.php');
    }else{
        // header('Location: cadastrohorario.php');
        $_SESSION['msg'] = 'Erro';
    }

}
?>