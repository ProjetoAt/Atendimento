<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	if (isset($_POST['id_nota']) and isset($_POST['codigo']) ) {

		require_once('conexaoDao.php');
		$conexaoDao = new conexaoDao;
		$con = $conexaoDao->conexao();
		$id_nota = $_POST['id_nota'];
		$codigo = $_POST['codigo'];

		$result = array(
			'error' => null
			);
		try {
			$rs = $con->prepare("UPDATE atendimentos SET preenchido = 1, id_nota = :idnota WHERE codigo = :codigo");
			$rs->bindValue(":idnota",$id_nota);
			$rs->bindValue(":codigo",$codigo);
			$rs->execute();
			
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}

		echo json_encode($result);
	}
}
?>