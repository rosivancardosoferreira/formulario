<?php
session_start();    
include('../server/scriptServer.php');
$conn = getConnection();
if(isset($_POST['btn_enviar'])) {
    $sql = 'INSERT INTO tb_atividade (cod_atividade, cod_data_hora, numero_participantes, palestrante1_nome, palestrante1_instituicao, palestrante1_titulacao, palestrante1_e_mail, palestrante1_celular, palestrante2_nome, palestrante2_instituicao, palestrante2_titulacao, palestrante2_e_mail, palestrante2_celular, palestrante3_nome, palestrante3_instituicao, palestrante3_titulacao, palestrante3_e_mail, palestrante3_celular, palestrante4_nome, palestrante4_instituicao, palestrante4_titulacao, palestrante4_e_mail, palestrante4_celular, titulo, area_conhecimento, tipo_atividade, sugestao_data_horario, mensagem) VALUES (?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?,   ?)';
    adicionarDados($sql, $conn);
} else {        
    $_SESSION['inserir'] = 'Algo deu errado, preencha a formulário novamente.';
    header('Location: ../index.php');
}

function adicionarDados($sql, $conn) {    
    $cod_atividade = primaryKey('cod_data_hora', 'tb_data_hora', $conn);
    
    if(isset($_POST['data_hora'])){
        if($_POST['data_hora'] == ''){
            $cod_data_hora = '767'; //FOREING KEY
        }else{
            $cod_data_hora = isset($_SESSION['cod_data_hora'][$_POST['data_hora']]) ? $_SESSION['cod_data_hora'][$_POST['data_hora']] : '767';
        }
    }else{
        $cod_data_hora = '767'; //FOREING KEY
    }
    
    
    $numero_participantes = $_POST['numero_participantes'];
    $palestrante1_nome = strlen($_POST['palestrante1_nome']) < 100? $_POST['palestrante1_nome'] : substr($_POST['palestrante1_nome'], 0, 99);
    $palestrante1_instituicao = strlen($_POST['palestrante1_instituicao']) < 100? $_POST['palestrante1_instituicao'] : substr($_POST['palestrante1_instituicao'], 0, 99);
    if($_POST['palestrante1_titulacao'] == 'Outro') {
        $palestrante1_titulacao = strlen($_POST['palestrante1_titulacao_outra']) < 100? $_POST['palestrante1_titulacao_outra'] : substr($_POST['palestrante1_titulacao_outra'], 0, 99);
    }else{
        $palestrante1_titulacao = strlen($_POST['palestrante1_titulacao']) < 100? $_POST['palestrante1_titulacao'] : substr($_POST['palestrante1_titulacao'], 0, 99);
    }
    $palestrante1_e_mail = strlen($_POST['palestrante1_e_mail']) < 100? $_POST['palestrante1_e_mail'] : substr($_POST['palestrante1_e_mail'], 0, 99);
    $palestrante1_celular = strlen($_POST['palestrante1_celular']) < 100? $_POST['palestrante1_celular'] : substr($_POST['palestrante1_celular'], 0, 99);

    $palestrante2_nome = strlen($_POST['palestrante2_nome']) < 100? $_POST['palestrante2_nome'] : substr($_POST['palestrante2_nome'], 0, 99);
    $palestrante2_instituicao = strlen($_POST['palestrante2_instituicao']) < 100? $_POST['palestrante2_instituicao'] : substr($_POST['palestrante2_instituicao'], 0, 99);
    if($_POST['palestrante2_titulacao'] == 'Outro') {
        $palestrante2_titulacao = strlen($_POST['palestrante2_titulacao_outra']) < 100? $_POST['palestrante2_titulacao_outra'] : substr($_POST['palestrante2_titulacao_outra'], 0, 99);
    }else{
        $palestrante2_titulacao = strlen($_POST['palestrante2_titulacao']) < 100? $_POST['palestrante2_titulacao'] : substr($_POST['palestrante2_titulacao'], 0, 99);
    }
    
    $palestrante2_e_mail = strlen($_POST['palestrante2_e_mail']) < 100? $_POST['palestrante2_e_mail'] : substr($_POST['palestrante2_e_mail'], 0, 99);
    $palestrante2_celular = strlen($_POST['palestrante2_celular']) < 100? $_POST['palestrante2_celular'] : substr($_POST['palestrante2_celular'], 0, 99);

    $palestrante3_nome = strlen($_POST['palestrante3_nome']) < 100? $_POST['palestrante3_nome'] : substr($_POST['palestrante3_nome'], 0, 99);
    $palestrante3_instituicao = strlen($_POST['palestrante3_instituicao']) < 100? $_POST['palestrante3_instituicao'] : substr($_POST['palestrante3_instituicao'], 0, 99);
    if($_POST['palestrante3_titulacao'] == 'Outro') {
        $palestrante3_titulacao = strlen($_POST['palestrante3_titulacao_outra']) < 100? $_POST['palestrante3_titulacao_outra'] : substr($_POST['palestrante3_titulacao_outra'], 0, 99);
    }else{
        $palestrante3_titulacao = strlen($_POST['palestrante3_titulacao']) < 100? $_POST['palestrante3_titulacao'] : substr($_POST['palestrante3_titulacao'], 0, 99);
    }
    $palestrante3_e_mail = strlen($_POST['palestrante3_e_mail']) < 100? $_POST['palestrante3_e_mail'] : substr($_POST['palestrante3_e_mail'], 0, 99);
    $palestrante3_celular = strlen($_POST['palestrante3_celular']) < 100? $_POST['palestrante3_celular'] : substr($_POST['palestrante3_celular'], 0, 99);

    $palestrante4_nome = strlen($_POST['palestrante4_nome']) < 100? $_POST['palestrante4_nome'] : substr($_POST['palestrante4_nome'], 0, 99);    
    $palestrante4_instituicao = strlen($_POST['palestrante4_instituicao']) < 100? $_POST['palestrante4_instituicao'] : substr($_POST['palestrante4_instituicao'], 0, 99);
    if($_POST['palestrante4_titulacao'] == 'Outro') {
        $palestrante4_titulacao = strlen($_POST['palestrante4_titulacao_outra']) < 100? $_POST['palestrante4_titulacao_outra'] : substr($_POST['_outra'], 0, 99);
    }else{
        $palestrante4_titulacao = strlen($_POST['palestrante4_titulacao']) < 100? $_POST['palestrante4_titulacao'] : substr($_POST['palestrante4_titulacao'], 0, 99);
    }
    $palestrante4_e_mail = strlen($_POST['palestrante4_e_mail']) < 100? $_POST['palestrante4_e_mail'] : substr($_POST['palestrante4_e_mail'], 0, 99);
    $palestrante4_celular = strlen($_POST['palestrante4_celular']) < 100? $_POST['palestrante4_celular'] : substr($_POST['palestrante4_celular'], 0, 99);
    
    $titulo = strlen($_POST['titulo']) < 100? $_POST['titulo'] : substr($_POST['titulo'], 0, 99);
    $area_conhecimento = strlen($_POST['area_conhecimento']) < 100? $_POST['area_conhecimento'] : substr($_POST['area_conhecimento'], 0, 99);
    $tipo_atividade = strlen($_POST['tipo_atividade']) < 100? $_POST['tipo_atividade'] : substr($_POST['tipo_atividade'], 0, 99);



    $sugestao_data_horario = strlen($_POST['sugestao_data_horario']) < 100? $_POST['sugestao_data_horario'] : substr($_POST['sugestao_data_horario'], 0, 99);
    $mensagem  = strlen($_POST['mensagem']) < 100? $_POST['mensagem'] : substr($_POST['mensagem'], 0, 99);

    // TESTES DE IMPRESSOES
    // echo 'cod_atividade: '.$cod_atividade.'<br>';
    // echo 'cod_data_hora: '.$cod_data_hora.'<br>';
    // echo 'numero_participantes: '.$numero_participantes.'<br><br>';
    // echo 'palestrante1_nome: '.$palestrante1_nome.'<br>';
    // echo 'palestrante1_instituicao: '.$palestrante1_instituicao.'<br>';
    // echo 'palestrante1_titulacao: '.$palestrante1_titulacao.'<br>';
    // echo 'palestrante1_e_mail: '.$palestrante1_e_mail.'<br>';
    // echo 'palestrante1_celular: '.$palestrante1_celular.'<br><br>';

    // echo 'palestrante2_nome: '.$palestrante2_nome.'<br>';
    // echo 'palestrante2_instituicao: '.$palestrante2_instituicao.'<br>';
    // echo 'palestrante2_titulacao: '.$palestrante2_titulacao.'<br>';    
    // echo 'palestrante2_e_mail: '.$palestrante2_e_mail.'<br>';
    // echo 'palestrante2_celular: '.$palestrante2_celular.'<br><br>';

    // echo 'palestrante3_nome: '.$palestrante3_nome.'<br>';
    // echo 'palestrante3_instituicao: '.$palestrante3_instituicao.'<br>';
    // echo 'palestrante3_titulacao: '.$palestrante3_titulacao.'<br>';
    // echo 'palestrante3_e_mail: '.$palestrante3_e_mail.'<br>';
    // echo 'palestrante3_celular: '.$palestrante3_celular.'<br><br>';

    // echo 'palestrante4_nome: '.$palestrante4_nome.'<br>';
    // echo 'palestrante4_instituicao: '.$palestrante4_instituicao.'<br>';
    // echo 'palestrante4_titulacao: '.$palestrante4_titulacao.'<br>';
    // echo 'palestrante4_e_mail: '.$palestrante4_e_mail.'<br>';
    // echo 'palestrante4_celular: '.$palestrante4_celular.'<br><br>';
    
    // echo 'titulo: '.$titulo.'<br>';
    // echo 'area_conhecimento: '.$area_conhecimento.'<br>';
    // echo 'tipo_atividade: '.$tipo_atividade.'<br>';
    // echo 'sugestao_data_horario: '.$sugestao_data_horario.'<br>';
    // echo 'mensagem : '.$mensagem .'<br>';
    // FIM TESTE DE IMPRESSORES

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $cod_atividade);
    $stmt->bindValue(2, $cod_data_hora);
    $stmt->bindValue(3, $numero_participantes);
    $stmt->bindValue(4, $palestrante1_nome);
    $stmt->bindValue(5, $palestrante1_instituicao);
    $stmt->bindValue(6, $palestrante1_titulacao);
    $stmt->bindValue(7, $palestrante1_e_mail);
    $stmt->bindValue(8, $palestrante1_celular);
    $stmt->bindValue(9, $palestrante2_nome);
    $stmt->bindValue(10, $palestrante2_instituicao);
    $stmt->bindValue(11, $palestrante2_titulacao);
    $stmt->bindValue(12, $palestrante2_e_mail);
    $stmt->bindValue(13, $palestrante2_celular);
    $stmt->bindValue(14, $palestrante3_nome);
    $stmt->bindValue(15, $palestrante3_instituicao);
    $stmt->bindValue(16, $palestrante3_titulacao);
    $stmt->bindValue(17, $palestrante3_e_mail);
    $stmt->bindValue(18, $palestrante3_celular);
    $stmt->bindValue(19, $palestrante4_nome);
    $stmt->bindValue(20, $palestrante4_instituicao);
    $stmt->bindValue(21, $palestrante4_titulacao);
    $stmt->bindValue(22, $palestrante4_e_mail);
    $stmt->bindValue(23, $palestrante4_celular);
    $stmt->bindValue(24, $titulo);
    $stmt->bindValue(25, $area_conhecimento);
    $stmt->bindValue(26, $tipo_atividade);
    $stmt->bindValue(27, $sugestao_data_horario);
    $stmt->bindValue(28, $mensagem);
    
        if($stmt->execute()){
            // echo 'sucesso';            
            if($cod_data_hora != '767'){
                atualizarDaraHora($conn, $cod_data_hora);
            }
            $_SESSION['confirma'] = 'sim';
            header('Location: ../confirma.php');
        }else{
            $_SESSION['inserir'] = 'Algo deu errado, preencha a formulário novamente.';
            header('Location: ../index.php');            
        }
}

function atualizarDaraHora($conn, $codigo) {
    $sql = 'UPDATE tb_data_hora SET checked = ? WHERE cod_data_hora = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, 'S');
    $stmt->bindValue(2, $codigo);
    $stmt->execute();
}

//FUNCOES DE CRIPGRAFIAS
function primaryKey($codigo, $tabela, $conn) {        
    do{
        $count = serial($codigo, $tabela, $conn);		
        $cod = substr(password_hash($count, PASSWORD_DEFAULT), 1,30);	
        $sql = "SELECT $codigo FROM $tabela WHERE $codigo = ? LIMIT 1";
        $stmt = $conn->prepare($sql);	
        $stmt->bindValue(1,$cod);			
        $stmt->execute();		
    }while($stmt->rowCount() > 0);
    return $cod;
}

function serial($codigo, $tabela, $conn) {
    $sql = "SELECT $codigo FROM $tabela";
    $stmt = $conn->prepare($sql);
    $stmt->execute();	
    return $stmt->rowCount()+1;
}

?>