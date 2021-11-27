<?php

//inportando o arquivo de conexão com o BD 
require_once('conexao.php');

require_once('../modulo/config.php');

require_once('../upload.php');


//declaração das variaveis

$nome_livro = (string) null;
$qts_de_pag = (string) null;
$capa_dura = (string) null;
$preco = (string) null;
$categoria = (string) null;
$file = (string) null;
$nomeFoto = (string) null;

//se o botão for clicado faça isso
if(isset($_POST['btnEnviar'])){

    $nome_livro = $_POST['txtNome'];
    $qts_de_pag = $_POST['txtLogin'];
    $capa_dura = $_POST['txtNickName'];
    $preco = $_POST['txtSenha'];
    $categoria = $_POST['txtEmail'];
    $dataAtual = date('Y/m/d');

    //RECEBE O OBJ ARRAY DO FILE, QUE A INDEX ENVIOU PELO METODO POST E ENCTYPE
    $file = $_FILES['fleFoto'];


    $nomeFoto = uploadArquivo($file);

    
    //inserir dados no BD, atravez do que o cliente escrever no formulario
    //SQL (structured query language)
    $sql = "insert into livros
    
        (nome_livro, qts_de_pag, capa_dura, preco, categoria, dataCadastro, foto)
    values ('".$nome_livro."', '".$qts_de_pag."', '".$capa_dura."', '".$preco."', '" .$categoria."', '".$dataAtual."', '".$nomeFoto."')
    ";

    //abrindo conexão com o banco 
    $conexao = conexaoMysql();

    if(mysqli_query($conexao, $sql))
        echo(REGISTRO_SALVO);

     else
        
        echo(ERRO_BD);
}
?>