<?php
/*************************************
Objetivo: Arquivo para fazer upload de Imagens
Data: 26/11/2021
Autor: Edson Lucas
**************************************/ 

function uploadArquivo($arrayFile){
    //declaração de variaveis
    $arquivoFoto = (string) null;
    $tamanhoFoto = (int) 0;
    $tamanhoFotoKB = (int) 0;
    $extensaoFoto = (string) null;
    $tipoFoto = (string) null;
    $nomeFoto = (string) null;
    $nomeFotocryt = (string) null;
    $caminhoFotoTemp = (string) null;
    


    //variaveis de anbiente
    define ('TAMANHO_MAXIMO' , '2024');
    define ('NOME_DIRETORIO' , '../arquivos/');
    $tipos_permitidos = array ("image/png", "imagem/jpg", "imagem/jpeg", "imagem/gif", "imagem/bmp","imagem/piff");

    
    //recebe o objeto array da foto
    $arquivoFoto = $arrayFile;

    //valida se o arquivo que esta chegando existe
    if($arquivoFoto['size'] > 0 && $arquivoFoto['type'] !=""){

        //RECEBE O TAMANHO ORIGINAL DA FOTO EM bytes
        $tamanhoFoto =  $arquivoFoto['size'];   

        //CONVERTE O TAMANHO DA FOTO EN KB
        $tamanhoFotoKB =  $tamanhoFoto/1024;

        //recebe o tipo de arquivo da foto (image/png ou image/jpg, etc...)
        $tipoFoto =  $arquivoFoto['type'];  

       
        if($tamanhoFotoKB <= TAMANHO_MAXIMO){

            if(in_array($tipoFoto, $tipos_permitidos)){

                //SEPARANDO O NOME DO ARQUIVO E A EXTENÇÃO DO ARQUIVO
                $nomeFoto = pathinfo($arquivoFoto['name'], PATHINFO_FILENAME);
                $extensaoFoto = pathinfo($arquivoFoto['name'], PATHINFO_EXTENSION);



                  //converte o nome do arquivo original em uma sequencia de letras e numeros
                //juntando com ID unico e a hora, minutos, segundos que a foto ata sendo enviada para o servidor
                $nomeFotocryt = md5($nomeFoto . uniqid(time()));

                $nomeFotocryt = $nomeFotocryt . "." . $extensaoFoto;

                $caminhoFotoTemp = $arquivoFoto["tmp_name"];

                // echo("$nomeFotocryt");
                // // echo("$caminhoFotoTemp");
                // die;


               if(move_uploaded_file( $caminhoFotoTemp, NOME_DIRETORIO.$nomeFotocryt))
                    return  $nomeFotocryt;
                else
                    return false;    

            }else
                echo("Tipo de arquivo inválido para subir no servidor");
        }else
            echo("Tamanho de arquivo invalido, o permitido é no maximo: " . TAMANHO_MAXIMO . "Kb");

    } 
}



?>