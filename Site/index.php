<?php 
	require 'app/core/FunctionsCore.php';
	require 'app/controllers/pagesController.php';

	$controllerName = 'pagesController';
	$acao = null;
    $actionName = 'e404';
	//Instanciando o Controller
	$controllerName = "app\\controllers\\".$controllerName ;
	$controller = new  $controllerName;
	//Metodo para Verificar se a Pagina é existente.
	$url = isset( $_GET['url'] ) ? $_GET['url'] : 'home';
	$url = TratamentoAmigavel($url);
	$url2 = $url;
	$url = explode('/', $url);
	$url[0] = ($url[0] == NULL ? 'home' : $url[0]);
	if(isset($url[1]) && method_exists($controller,$url[0])){
		// Nome1/nome2 - apartir da  raiz
		$url2 = str_replace(".php","", $url2);
		$actionName = $url[0];
		$acao = $url[1];
	}else{
		//Verifica se tem nome1.php apartir da pasta View
		$url = str_replace(".php","", $url);
		if(method_exists($controller,$url[0])){
			$actionName = $url[0];
	        //Verificar o Sub Directorio
			if(isset($url[1])){
				$acao = $url[1];
			}
		}else{
				Header("location: ".$base."e404");
		}
	}
	$controller->$actionName($acao);

	?>