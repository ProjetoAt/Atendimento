<?php 

	namespace app\controllers;
	
	$title = "Projeto atendimento";
	$base = 'http://localhost/Atendimento/Site/';

	class PagesController{
		function home($acao){

			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			//include 'app/dao/conexaoDao.php';
			include 'app/controllers/HomeController.php';
			include 'app/views/headerView.php';
	        include 'app/views/footerView.php';
		}

		function statistics($acao){
			$acao = explode('/', $acao);
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			include 'app/controllers/StatisticsController.php';
			include 'app/views/headerView.php';
	        include 'app/views/footerView.php';
		}


		function e404($acao){
			print_r($acao);
			echo "PAGINA NAO EXISTE";

		}
		
	}

 ?>