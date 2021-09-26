<?php

if(isset($_POST['electro'])) {
    echo "ver dados";
    echo "<br>aeroespacial_e_defesa: ".$_POST['aeroespacial_e_defesa'];
    echo "<br>agua: ".$_POST['agua'];
    echo "<br>biomas_e_bioeconomia: ".$_POST['biomas_e_bioeconomia'];
    echo "<br>ciencias_e_tecnologias_sociais: ".$_POST['ciencias_e_tecnologias_sociais'];
    echo "<br>clima: ".$_POST['clima'];
    echo "<br>economia_e_sociedade_digital: ".$_POST['economia_e_sociedade_digital'];
    echo "<br>energia: ".$_POST['energia'];
    echo "<br>minerais_estrategicos: ".$_POST['minerais_estrategicos'];
    echo "<br>nuclear: ".$_POST['nuclear'];
    echo "<br>saude: ".$_POST['saude'];
    echo "<br>tecnologias_convergentes_e_habilitadoras: ".$_POST['tecnologias_convergentes_e_habilitadoras'];

}else{
    echo "sem clique";
}

?>