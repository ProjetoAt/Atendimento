<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

	$tempo_espera = $_POST['tempo_espera'];
	$atendente = $_POST['atendente'];
	$problema_resolvido = $_POST['problema_resolvido'];

	$sql = "INSERT INTO notas (tempo_espera, atendente, problema_resolvido) VALUES ('$tempo_espera', '$atendente', '$problema_resolvido')";

	require_once('Conexao.php');

	if(mysqli_query($con, $sql)){
		echo 'Notas cadastradas com sucesso!';
	}else{
		echo 'Não foi possível cadastras as notas!';
	}

	mysqli_close($con);
}

?>