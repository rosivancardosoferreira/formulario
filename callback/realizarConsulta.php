<?php
include('server/scriptServer.php');

function resumoCadastroAtividades() {
    $conn = getConnection();
    $sql = "SELECT area_conhecimento, tipo_atividade FROM tb_atividade";
    $stmt = $conn->prepare($sql);
    $stmt->execute();     
    // $area, $palestra, $minicurso, $trabalhoConclusao, $projetoIniciacao, $projetoExtensao    
    $vetQB = ['Química e Biologia', 0, 0, 0, 0, 0];
    $vetFC = ['Farmácia', 0, 0, 0, 0, 0];
    $vetAG = ['Agronomia', 0, 0, 0, 0, 0];
    $vetES = ['Engenharia Sanitária', 0, 0, 0, 0, 0];
    $vetEP = ['Engenharia de Produção', 0, 0, 0, 0, 0];
    $vetMF = ['Matemática e Física', 0, 0, 0, 0, 0];
    $vetIM = ['Informática', 0, 0, 0, 0, 0];
    $vetEC = ['Educação', 0, 0, 0, 0, 0];
    $vetMA = ['Meio Ambiente e Saúde', 0, 0, 0, 0, 0];
    $vetAD = ['Administração', 0, 0, 0, 0, 0];
    $vetECN = ['Economia e Direito', 0, 0, 0, 0, 0];
    
    while($dados = $stmt->fetch(PDO::FETCH_OBJ)) {
        switch ($dados->tipo_atividade) {
            case 'PA':
                $vetQB[1] = $dados->area_conhecimento == 'QB'? $vetQB[1] + 1 : $vetQB[1];
                $vetFC[1] = $dados->area_conhecimento == 'FC'? $vetFC[1] + 1 : $vetFC[1];
                $vetAG[1] = $dados->area_conhecimento == 'AG'? $vetAG[1] + 1 : $vetAG[1];
                $vetES[1] = $dados->area_conhecimento == 'ES'? $vetES[1] + 1 : $vetES[1];
                $vetEP[1] = $dados->area_conhecimento == 'EP'? $vetEP[1] + 1 : $vetEP[1];
                $vetMF[1] = $dados->area_conhecimento == 'MF'? $vetMF[1] + 1 : $vetMF[1];
                $vetIM[1] = $dados->area_conhecimento == 'IM'? $vetIM[1] + 1 : $vetIM[1];
                $vetEC[1] = $dados->area_conhecimento == 'EC'? $vetEC[1] + 1 : $vetEC[1];
                $vetMA[1] = $dados->area_conhecimento == 'MA'? $vetMA[1] + 1 : $vetMA[1];
                $vetAD[1] = $dados->area_conhecimento == 'AD'? $vetAD[1] + 1 : $vetAD[1];
                $vetECN[1] = $dados->area_conhecimento == 'ECN'? $vetECN[1] + 1 : $vetECN[1];
                break;

            case 'MC':
                // $vetQB[2] = $dados->area_conhecimento == 'QB'? $vetQB[2] + 1 : $vetQB[2];
                $vetQB[2] = $dados->area_conhecimento == 'QB'? $vetQB[2] + 1 : $vetQB[2];
                $vetFC[2] = $dados->area_conhecimento == 'FC'? $vetFC[2] + 1 : $vetFC[2];
                $vetAG[2] = $dados->area_conhecimento == 'AG'? $vetAG[2] + 1 : $vetAG[2];
                $vetES[2] = $dados->area_conhecimento == 'ES'? $vetES[2] + 1 : $vetES[2];
                $vetEP[2] = $dados->area_conhecimento == 'EP'? $vetEP[2] + 1 : $vetEP[2];
                $vetMF[2] = $dados->area_conhecimento == 'MF'? $vetMF[2] + 1 : $vetMF[2];
                $vetIM[2] = $dados->area_conhecimento == 'IM'? $vetIM[2] + 1 : $vetIM[2];
                $vetEC[2] = $dados->area_conhecimento == 'EC'? $vetEC[2] + 1 : $vetEC[2];
                $vetMA[2] = $dados->area_conhecimento == 'MA'? $vetMA[2] + 1 : $vetMA[2];
                $vetAD[2] = $dados->area_conhecimento == 'AD'? $vetAD[2] + 1 : $vetAD[2];
                $vetECN[2] = $dados->area_conhecimento == 'ECN'? $vetECN[2] + 1 : $vetECN[2];
                break;

            case 'TCC':
                // $vetQB[3] = $dados->area_conhecimento == 'QB'? $vetQB[3] + 1 : $vetQB[3];

                $vetQB[3] = $dados->area_conhecimento == 'QB'? $vetQB[3] + 1 : $vetQB[3];
                $vetFC[3] = $dados->area_conhecimento == 'FC'? $vetFC[3] + 1 : $vetFC[3];
                $vetAG[3] = $dados->area_conhecimento == 'AG'? $vetAG[3] + 1 : $vetAG[3];
                $vetES[3] = $dados->area_conhecimento == 'ES'? $vetES[3] + 1 : $vetES[3];
                $vetEP[3] = $dados->area_conhecimento == 'EP'? $vetEP[3] + 1 : $vetEP[3];
                $vetMF[3] = $dados->area_conhecimento == 'MF'? $vetMF[3] + 1 : $vetMF[3];
                $vetIM[3] = $dados->area_conhecimento == 'IM'? $vetIM[3] + 1 : $vetIM[3];
                $vetEC[3] = $dados->area_conhecimento == 'EC'? $vetEC[3] + 1 : $vetEC[3];
                $vetMA[3] = $dados->area_conhecimento == 'MA'? $vetMA[3] + 1 : $vetMA[3];
                $vetAD[3] = $dados->area_conhecimento == 'AD'? $vetAD[3] + 1 : $vetAD[3];
                $vetECN[3] = $dados->area_conhecimento == 'ECN'? $vetECN[3] + 1 : $vetECN[3];
                break;

            case 'IC':
                // $vetQB[4] = $dados->area_conhecimento == 'QB'? $vetQB[4] + 1 : $vetQB[4];

                $vetQB[4] = $dados->area_conhecimento == 'QB'? $vetQB[4] + 1 : $vetQB[4];
                $vetFC[4] = $dados->area_conhecimento == 'FC'? $vetFC[4] + 1 : $vetFC[4];
                $vetAG[4] = $dados->area_conhecimento == 'AG'? $vetAG[4] + 1 : $vetAG[4];
                $vetES[4] = $dados->area_conhecimento == 'ES'? $vetES[4] + 1 : $vetES[4];
                $vetEP[4] = $dados->area_conhecimento == 'EP'? $vetEP[4] + 1 : $vetEP[4];
                $vetMF[4] = $dados->area_conhecimento == 'MF'? $vetMF[4] + 1 : $vetMF[4];
                $vetIM[4] = $dados->area_conhecimento == 'IM'? $vetIM[4] + 1 : $vetIM[4];
                $vetEC[4] = $dados->area_conhecimento == 'EC'? $vetEC[4] + 1 : $vetEC[4];
                $vetMA[4] = $dados->area_conhecimento == 'MA'? $vetMA[4] + 1 : $vetMA[4];
                $vetAD[4] = $dados->area_conhecimento == 'AD'? $vetAD[4] + 1 : $vetAD[4];
                $vetECN[4] = $dados->area_conhecimento == 'ECN'? $vetECN[4] + 1 : $vetECN[4];
                break;

            case 'EX':
                // $vetQB[5] = $dados->area_conhecimento == 'QB'? $vetQB[5] + 1 : $vetQB[5];

                $vetQB[5] = $dados->area_conhecimento == 'QB'? $vetQB[5] + 1 : $vetQB[5];
                $vetFC[5] = $dados->area_conhecimento == 'FC'? $vetFC[5] + 1 : $vetFC[5];
                $vetAG[5] = $dados->area_conhecimento == 'AG'? $vetAG[5] + 1 : $vetAG[5];
                $vetES[5] = $dados->area_conhecimento == 'ES'? $vetES[5] + 1 : $vetES[5];
                $vetEP[5] = $dados->area_conhecimento == 'EP'? $vetEP[5] + 1 : $vetEP[5];
                $vetMF[5] = $dados->area_conhecimento == 'MF'? $vetMF[5] + 1 : $vetMF[5];
                $vetIM[5] = $dados->area_conhecimento == 'IM'? $vetIM[5] + 1 : $vetIM[5];
                $vetEC[5] = $dados->area_conhecimento == 'EC'? $vetEC[5] + 1 : $vetEC[5];
                $vetMA[5] = $dados->area_conhecimento == 'MA'? $vetMA[5] + 1 : $vetMA[5];
                $vetAD[5] = $dados->area_conhecimento == 'AD'? $vetAD[5] + 1 : $vetAD[5];
                $vetECN[5] = $dados->area_conhecimento == 'ECN'? $vetECN[5] + 1 : $vetECN[5];
                break;            
            default:
            break;
        }        
    }    
    $matriz = [$vetAD, $vetAG, $vetECN, $vetEC, $vetEP, $vetES, $vetFC, $vetIM, $vetMF, $vetMA, $vetQB];
    return $matriz;
}

// $num = [];
// $num[0] = 10;
// echo $num[0];
// $num[0] = $num[0] + 1;
// echo '<br> somado: '.$num[0];
?>