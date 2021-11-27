<?php
/*****************************************************
 * Objetivo: Arquivo responsavel para excluir usuarios
 * data: 03/11
 * Autor: Edson lucas
 *  
 * ***************************************************/

require_once('conexao.php');

require_once('../modulo/config.php');

//declaração de variaveis
$modo = (string) null;
$id =(int) 0;


//Verifica se existe as variaveis modo e id no GET
if(isset($_GET['modo']) && isset($_GET['id'])){

    //Recebe as variaveis encamanhadas no GET pela index
    //strtoupper() converte uma string em MAIUSCULO
    $modo =strtoupper($_GET['modo']);
    $id = $_GET['id'];


    if($modo == 'EXCLUIR'){


        $sql = "delete from livros where  id_livro = " . $id;

        $conexao = conexaoMysql();

        if(mysqli_query($conexao, $sql))

            echo(REGISTRO_EXCLUIDO);
        else 
            echo(ERRO_BD);

    }

}




?>