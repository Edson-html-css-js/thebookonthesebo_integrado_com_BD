<?php 

    //import o arquivo de conexão com o BD
    require_once('conexao.php');

    //import do arquivo de configuração do sistema
    require_once('../modulo/config.php');

    //Declaração das variaveis
    $nome_livro = (string) null;
    $qts_de_pag = (string) null;
    $capa_dura = (string) null;
    $preco = (string) null;
    $categoria = (string) null;
    $dataAtual = (string) null;
    $id = (int) 0;

    //Valida se o botão foi clicado
    if(isset($_POST['btnEnviar']))
    {
        //Recebe o id do registro que deverá ser atualizado,
        //que foi encaminhado pelo action do form na index
        $id = $_GET['id'];

        //Recebe dados do formulário
        $nome_livro = $_POST['txtNome'];
        $qts_de_pag = $_POST['txtLogin'];
        $capa_dura = $_POST['txtNickName'];
        $preco = $_POST['txtSenha'];
        $categoria = $_POST['txtEmail'];
        //Recebe a data atual do servidor
        $dataAtual = date('Y-m-d');

        //echo($dataAtual);
        //die; //força a parada de execução do apache

        //Fazer tratamentos de erro conforme a necessidade


        //Inserir dados no BD
        //SQL (structured query language)
        $sql = "update livros set 
               nome_livro =  '".$nome_livro."',
               qts_de_pag = '".$qts_de_pag."',
               capa_dura = '".$capa_dura."',
                   preco = '".$preco."',
                   categoria = '".$categoria."',
                    dataCadastro = '".$dataAtual."' 
                where id_livro =".$id;

        //Abre a conexão com o BD Mysql
        $conexao = conexaoMysql();

        //Executa no BD o Insert e valida se deu certo ou não
        if (mysqli_query($conexao, $sql))
            echo(REGISTRO_SALVO);
        else
            echo(ERRO_BD);




    }

?>