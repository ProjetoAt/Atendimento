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
	//Verificar se Existe No Banco
	$cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : '' ;
	$_SESSION['cliente_cpf'] = $cpf;
	require_once 'app/dao/conexaoDao.php';
	require_once 'app/dao/clientesDao.php';
	$conexaoDao = new conexaoDao();
	$con = $conexaoDao->conexao();
	$clientesDao = new clientesDao($con);
	$clientesModel = new clientesModel();
	if ($cpf != '') {
		$clientesModel = $clientesDao->buscarCPF($cpf);
		if ($clientesModel->getNome() != '') {
			//echo "completo";
		}else{
			//echo "vazio";
			$clientesModel->setCpf($cpf);
		}
		$_SESSION['cliente_id'] = $clientesModel->getIdCliente();
	}



	unset($_POST);
}elseif(isset($_POST['enviar'])) {
	$etapa = 3;
	require_once 'app/dao/conexaoDao.php';
	require_once 'app/dao/clientesDao.php';
	$conexaoDao = new conexaoDao();
	$con = $conexaoDao->conexao();


	$clientesDao = new clientesDao($con);
	$clientesModel = new clientesModel();
	$nome = (isset($_POST['nome'])) ? $_POST['nome'] : '' ;
	$email = (isset($_POST['email'])) ? $_POST['email'] : '' ;
	$telefone = (isset($_POST['telefone'])) ? $_POST['telefone'] : '' ;
	$cpf = (isset($_POST['cpf'])) ? $_POST['cpf'] : '' ;
	$ra = (isset($_POST['ra'])) ? $_POST['ra'] : '' ;
		//
	$clientesModel->setCpf($cpf);
	$clientesModel->setNome($nome);
	$clientesModel->setEmail($email);
	$clientesModel->setTelefone($telefone);
		$clientesModel->setRa($ra); // Campo Opcional
		if ($nome != '' and $email != '' and $telefone != '' and $cpf != '') {
			if ($_SESSION['cliente_id'] != '') {
				$clientesModel->setIdCliente($_SESSION['cliente_id'] );
				$clientesDao->alterarAtendente($clientesModel);
			}else{
				$clientesDao->adicionarCliente($clientesModel);
			}
			if ($result['error'] != null) {
				$atendimentosDao = new atendimentosDao($con);
				$atendimentosModel = new atendimentosModel();
				$atendimentosModel->setAtendenteId($_SESSION['atendente_id']);
				$atendimentosModel->setClienteId($_SESSION['cliente_id']);
				$atendimentosModel->setCodigo(rand(0,999999));
				$atendimentosModel->setPreenchido(0);
				$atendimentosDao->adicionarAtendente($atendimentosModel);
			}

		}
		unset($_POST);
	}elseif(isset($_POST['finalizar'])) {
		$etapa =1;
		
		unset($_POST);
	}elseif(isset($_POST['voltar'])) {
		$etapa = 1;
		$cpf = (isset($_SESSION['cliente_cpf'])) ? $_SESSION['cliente_cpf'] : '' ;
		unset($_POST);
	}


	?>