<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	if (isset($_GET['id'])) {

		require_once('conexaoDao.php');
		$conexaoDao = new ConexaoDao;
		$con = $conexaoDao->conexao();
		$codigo = $_GET['id']; 

		try {
			$result = array(
				'error' => null,
				'data' => null
				);
			try {
				$rs = $this->con->prepare("SELECT codigo FROM atendimentos WHERE codigo= :codigo AND preenchido=0");
				$rs->bindValue(":codigo",$codigo);
				$rs->execute();
				$result['data'] = $rs->fetchAll(PDO::FETCH_OBJ);
			} catch (PDOException  $e) {
				$result['error']=$e->errorInfo[1];
			}	
			$result;
			echo json_encode($result);
		}
	}
}
?>