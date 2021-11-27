<?php 

    //import o arquivo de conexão com o BD
    require_once('bd2/conexao.php');

    //import do arquivo de configuração do sistema
    require_once('../modulo/config2.php');

    //Declaração das variaveis
    $nome = (string) null;
    $login = (string) null;
    $nickName = (string) null;
    $senha = (string) null;
    $email = (string) null;
    $dataAtual = (string) null;
    $id = (int) 0;

    //Valida se o botão foi clicado
    if(isset($_POST['btnEnviar']))
    {
        //Recebe o id do registro que deverá ser atualizado,
        //que foi encaminhado pelo action do form na index
        $id = $_GET['id'];

        //Recebe dados do formulário
        $nome = $_POST['txtNome'];
        $login = $_POST['txtLogin'];
        $nickName = $_POST['txtNickName'];
        $senha = $_POST['txtSenha'];
        $email = $_POST['txtEmail'];
        //Recebe a data atual do servidor
        $dataAtual = date('Y-m-d');

        //echo($dataAtual);
        //die; //força a parada de execução do apache

        //Fazer tratamentos de erro conforme a necessidade


        //Inserir dados no BD
        //SQL (structured query language)
        $sql = "update tblusuario set 
                    nome =  '".$nome."',
                    login = '".$login."',
                    nickname = '".$nickName."',
                    senha = '".$senha."',
                    email = '".$email."',
                    dataCadastro = '".$dataAtual."' 
                where idusuario =".$id;

        //Abre a conexão com o BD Mysql
        $conexao = conexaoMysql();

        //Executa no BD o Insert e valida se deu certo ou não
        if (mysqli_query($conexao, $sql))
            echo(REGISTRO_SALVO);
        else
            echo(ERRO_BD);




    }

?>