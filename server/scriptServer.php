<?php
	function getConnection(){
		$dns = 'mysql:host=banco.ufam.edu.br;dbname=dom_sncticet'; //DADOS DO SERVIDOR ONLINE
		$user = 'dom_sncticet'; //DADOS DO SERVIDOR ONLINE
		$pass = 'TB3rzVT8P7'; //DADOS DO SERVIDOR ONLINE

		try {
			$pdo = new PDO($dns, $user, $pass); //Conectado						
			return $pdo;
		}catch (PDOException $ex){
			echo 'Algo deu errado, tente novamente mais tarde.';			
		}
	}	
?>