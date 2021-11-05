<?php
/************************************************
 * Objetivo: Arquivo para realizar a conexão com o BD Mysql
 * Data: 20/10/2021
 * Autor: Edson Lucas
 ************************************************/


 //Estabelece a conexão com o BD Mysql
 function conexaoMysql() {

    //local do banco se for local "localhost", se for via servidor colocar o "IP"
    $host = (string) "localhost";
    $user = (string) "root";
    $password = (string) "052647lucas";
    $database = (string) "dbprojetofecaf";
    $conexao = (string) null;



  /*   Bibliotecas para estabelecer a conexão com o BD pelo php 
    
            mysql_connect() - é a mais antiga (Desatualizada)
            mysql_connect() - é uma biblioteca mais atualizada (segurança, perfomance)
            PDO - É a biblioteca para POO
  */

  // Abre a conexão com o BD atravez da biblioteca mysqli_connect()
    if($conexao = mysqli_connect($host, $user, $password, $database))

    //retorna a conexão se ela for estabelecida com su
    return $conexao;

  else
      return false;

 }
?>