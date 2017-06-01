<?php 

	namespace app\controllers;
	
	$title = "Projeto atendimento";
	$base = 'http://localhost/Atendimento/Site/';

	class PagesController{

		function home($acao){
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			$folhaEstilo = '';
			//include 'app/dao/conexaoDao.php';
			include 'app/controllers/loginController.php';
			include 'app/views/headerView.php';
	    include 'app/views/footerView.php';
		}

		function autentificacao($acao){
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			$folhaEstilo = '';
			//include 'app/dao/conexaoDao.php';
			include 'app/controllers/autentificacaoController.php';
			include 'app/views/headerView.php';
	    include 'app/views/footerView.php';
		}

		function statistics($acao){
			$acao = explode('/', $acao);
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			$folhaEstilo = '';
			include 'app/controllers/statisticsController.php';
			include 'app/views/headerView.php';
	    	include 'app/views/footerView.php';
		}

		function logout($acao){
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			$folhaEstilo = '';
			include 'app/controllers/logoutController.php';
		}
		
		function e404($acao){
			print_r($acao);
			echo "PAGINA NAO EXISTE";
		}
		
	}

 ?>