<?php 

	namespace app\controllers;
	
	$title = "Projeto atendimento";
	//$base = 'http://localhost/Atendimento/Site/';
	$base = 'http://localhost/Projetos/Atendimento/Site/'; //Luiz
	//$base = 'http://'.$_SERVER['HTTP_HOST'].'/';
	//if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    //    $base = "https://";
    //} else {
    //    $base = "http://";
    //    header("location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    //}
    //$base = $base.$_SERVER['HTTP_HOST'].'/';
	class pagesController{

		function home($acao){
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			$folhaEstilo = 'login.css';
			//include 'app/dao/conexaoDao.php';
			include 'app/controllers/loginController.php';
			include 'app/views/headerView.php';
	    include 'app/views/footerView.php';
		}

		function autentificacao($acao){
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			$folhaEstilo = 'autentificacao.css';
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
			$folhaEstilo = '';
			echo "PAGINA NAO EXISTE";
		}

		function adicionarnota($acao){
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			$folhaEstilo = '';
			include 'app/controllers/adicionarnotaController.php';
		}

		function updateAtendimento($acao){
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			$folhaEstilo = '';
			include 'app/controllers/updateAtendimentoController.php';
		}

		function validarpin($acao){
			$title = $GLOBALS["title"];
			$base = $GLOBALS["base"] ;
			$folhaEstilo = '';
			include 'app/controllers/validarpinController.php';
		}
		
	}

 ?>