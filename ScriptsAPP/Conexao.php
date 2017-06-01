<?php
  
  //Definindo constantes
  define('host','mysql.hostinger.com.br');
  define('user', 'u869400767_centr');
  define('pass', '123456');
  define('db', 'u869400767_atend');

  //Conectando
  $con = mysqli_connect(host,user,pass,db) or die ('Unable to Connect')  

?>