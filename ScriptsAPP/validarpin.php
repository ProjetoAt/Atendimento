<?php

	//Pegando o pin
	$ra = $_GET['id']; //Trocar para 'codigo' quando acabar o teste

	//Importando banco de dados
	require_once('Conexao.php');

	//Criando sql
	$sql = "select * from clientes where ra=$ra"; //trocar clientes por atendimento e ra por codigo

	//pegando resultado
	$r = mysqli_query($con,$sql);

	//inserindo o resultado em um vetor
	$result = array();
	$row = mysqli_fetch_array($r);
	
	array_push($result, array("ra"=>$row['ra']));

	//exibindo em formato json
	echo json_encode(array('result'=>$result));

	//fecha conexão
	mysqli_close($con);

?>