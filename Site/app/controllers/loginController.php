<?php 
//---------------------------//
$centro = "app/views/loginView.php";
require_once 'app/dao/conexaoDao.php';
require_once 'app/dao/atendentesDao.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (isLoggedIn()) {
  header('Location: autentificacao');
}
$conexaoDao = new conexaoDao;
$con = $conexaoDao->conexao();
$atendentesDao = new atendentesDao($con);
//----------------------------------//
$logando = false;
$cadastrando = false;

if (isset($_POST['enviar'])){
  $logando = true;
// resgata variáveis do formulário
  $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
  $password = isset($_POST['senha']) ? $_POST['senha'] : '';

  if (empty($usuario) || empty($password)){
      var_dump($_POST);//
      $erro = "Por Favor Preencha todos os Campos";
  }else{

// cria o hash da senha
    $passwordHash = make_hash($password);
    $atendentesModel = $atendentesDao->buscarAllLogin($usuario,$passwordHash);
    if (count($atendentesModel) <= 0){
      $erro = "Usuario e/ou Senha Incorretos";
    }else{
// pega o primeiro usuário
      $user = $atendentesModel[0];

      $_SESSION['logged_in'] = true;
      $_SESSION['atendente_id'] = $user->getIdAtendente();
      $_SESSION['atendente_nome'] = $user->getNome();
      $_SESSION['atendente_nivel'] = $user->getNivel();;
      session_write_close(); 
      header('Location: home');
    }
  }




}

?>