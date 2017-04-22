<?php

class conexaoDao{

    # Método que inicia a Conexão com o Banco de Dados.
    # Método estático - acessível sem instanciação.
    public function conexao(){
       try {
          $db_driver = 'mysql';
          $db_host = '127.0.0.1';
          $db_nome = 'bd_at';
          $db_usuario = 'root';
          $db_senha = '';
          # Atribui o objeto PDO à variável $db.
          $con = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            # Garante que o PDO lance exceções durante erros.
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codificação UFT-8.
            $con->exec('SET NAMES utf8');
        
           return $con;
        } catch (PDOException $e) {
           echo htmlentities('Houve um erro na conexão! ' . $e->getMessage());
            # Envia um e-mail para o e-mail oficial do sistema, em caso de erro de conexão.
             # mail($sistema_email, "PDOException em $sistema_titulo", $e->getMessage());
              # Então não carrega nada mais da página.
              die("Connection Error: " . $e->getMessage());
        }
    }

    //Simples Run de SQL, dependendo pode nao funcionar. Sómente para codigos pequenos, no qual não há necessidade de criar uma função para ela.
    public function sqlRun($con,$sql){
      $stmt = $con->prepare($sql);
      $stmt->execute();
    }
}