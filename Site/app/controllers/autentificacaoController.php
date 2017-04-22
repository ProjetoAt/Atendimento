<?php 
//---------------------------//
$centro = "app/views/autentificacaoView.php";

//----------------------------------//
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
$etapa = 1;
if (isset($_POST['verificar'])) {
	$etapa = 2;

	unset($_POST);
}elseif(isset($_POST['enviar'])) {
	$etapa = 3;

	unset($_POST);
}elseif(isset($_POST['finalizar'])) {
	$etapa =1;
	unset($_POST);
}elseif(isset($_POST['voltar'])) {
	$etapa = 1;

	unset($_POST);
}


?>