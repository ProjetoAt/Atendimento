<?php

if (isset($_GET['id'])) {

	require_once('app/dao/conexaoDao.php');
	$conexaoDao = new ConexaoDao;
	$con = $conexaoDao->conexao();
	$codigo = $_GET['id']; 

	$result = array(
		'result' => null
		);
	try {
		$rs = $con->prepare("SELECT codigo FROM atendimentos WHERE codigo= :codigo AND preenchido=0");
		$rs->bindValue(":codigo",$codigo);
		$rs->execute();
		$result['result'] = $rs->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException  $e) {
		$result['error']=$e->errorInfo[1];
	}	
	echo json_encode($result);
}

?>