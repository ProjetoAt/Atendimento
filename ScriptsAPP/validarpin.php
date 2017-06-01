<?php

	//Pegando o pin
	$codigo = $_GET['id']; //Trocar para 'codigo' quando acabar o teste

	//Importando banco de dados
	require_once('Conexao.php');

	//Criando sql
	$sql = "select * from atendimento where codigo=$codigo snd preenchido = 0"; //trocar clientes por atendimento e ra por codigo

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