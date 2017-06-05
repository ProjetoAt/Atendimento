<?php

	//Pegando o pin
	$codigo = $_GET['id']; 
	
	//Importando banco de dados
	require_once('Conexao.php');

	//Criando sql
	$sql = "select * from atendimentos where codigo=$codigo and preenchido=0"; 
	
	//pegando resultado
	$r = mysqli_query($con,$sql);

	//inserindo o resultado em um vetor
	$result = array();
	$row = mysqli_fetch_array($r);
	
	array_push($result, array("codigo"=>$row['codigo']));

	//exibindo em formato json
	echo json_encode(array('result'=>$result));

	//fecha conexão
	mysqli_close($con);

?>