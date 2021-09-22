<?php
    session_start();   
    include('../server/scriptServer.php');
    $conn = getConnection();
    $codigo = $_SESSION['cod_data_hora'][$_POST['posicao']];
    
    // $dados = [$posicao];
    $sql = 'SELECT cod_data_hora FROM tb_data_hora WHERE cod_data_hora = ? AND checked = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $codigo);
    $stmt->bindValue(2, 'N');
    if($stmt->execute()){
        if($stmt->rowCount() > 0){
            $dados = ['verdadeiro', $codigo];
        }else{
            $dados = ['falso', $codigo];
            $_SESSION['perdeuVez'] = 'Alguém confirmou o horário primeiro, escolha outro.';
        }
    }




    echo (json_encode($dados));

?>