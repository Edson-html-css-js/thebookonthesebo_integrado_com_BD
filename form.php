<?php 
    
    // import do arquivo para conectar no BD
    require_once('bd/conexao.php');
    //Abre a conexão com o BD e guarda na variavel local $conexao    
    $conexao = conexaoMysql();

    //Declaração de Variaveis
    $modo = (string) null;
    $id = (int) 0;
    $nome_livro = (string) null;
    $qts_de_pag = (string) null;
    $capa_dura = (string) null;
    $preco = (string) null;
    $categoria = (string) null;

    //Essa variavel será utilizada no action do form, para diferenciar as ações de
    //inserir um novo registro ou atualizar um registro existente
    $action = (string) "bd/inserirUsuario.php";

    //Valida se existe a variavel modo e a variavel id na url do 
    //navegador, se existir é pq foi clicado no botão editar
    if(isset($_GET['modo']) && isset($_GET['id']))
    {
        //Recebe o conteudo da variavel modo (em MAIUSCULO)
        $modo = strtoupper($_GET['modo']);
        
        //Recebe o conteudo da variavel id
        $id = $_GET['id'];
        
        //Valida se a variavel modo tem o valor editar
        if($modo == 'EDITAR')
        {
            //Script para buscar no BD
            $sql = "select * from livros where id_livro=".$id;
            
            //Executa o script no BD
            $select = mysqli_query($conexao, $sql);

            //Valida se existe algum registro no BD e converte 
            //o resultado em um array
            if($arrayRegistro = mysqli_fetch_assoc($select))
            {
                //Recebe os dados do BD e guarda em variaveis locais
                $nome_livro = $arrayRegistro['nome_livro'];
                $qts_de_pag = $arrayRegistro['qts_de_pag'];
                $capa_dura = $arrayRegistro['capa_dura'];
                $preco = $arrayRegistro['preco'];
                $categoria = $arrayRegistro['categoria'];

                //Altera o arquivo que será chamado pelo form, pois precisamos editar os dados
                $action = "bd/editarUsuario.php?id=".$id;
                

            }
        }
    }

?>

<!DOCTYPE>


<html lang="pt-br">

<head>
    <title>the book on the sebo</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/img.ico/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Bem vindos ao mais completo Sebo</h1>
          <p class="lead">Frete Grátis acima de R$199,99* - Cupom EUQUERO.</p>
        </div>
      </div>
    <!-- Início do cabeçalho da página-->
    <header class="container">
        <h1 class="logotipo">
            <img src="img/logo/Capturar.JPG" alt="the book on the sebo">
        </h1>
       
        
        <nav class="menu-opcoes">
            <ul>
                <li class="link-ativo radius-dez"><a href="index.html">Principal</a></li>
                <li><a href="lista.html">Lista de desejos</a></li>
                <li><a href="teste.html">Cartão fidelidade</a></li>
                <li><a href="sobre.html">Sobre</a></li>
                <li><a href="ajuda.html">Ajuda</a></li>
                
            </ul>
        </nav>
    </header>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery.js"></script>
        <script>
            
            $(document).ready(function () {
                 
                 //função para abrir a modal
                $('.pesquisar').click(function () {
                    $('#containermodal').fadeIn(1000);
                });

                //função para fechar modal
                $('.Excluir').click(function () {

                    $('#containermodal').fadeOut();
                });
            });

        </script>

    </head>

    <body>


        <div id="containermodal">
            <img src="img/imgphp/trash.png" alt="Excluir" class='Excluir'>
         
        <div id="modal">
            
        </div>


        </div>



        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Livros </h1>
            </div>
            <div id="cadastroInformacoes">
                               
                <form action="<?=$action?>" name="frmCadastro" method="post" enctype="multipart/form-data" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome do Livro: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$nome_livro?>" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Autor: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNickName" value="<?=$qts_de_pag?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Ano de Publicação: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtLogin" value="<?=$capa_dura?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Preço: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtSenha" value="<?=$preco?>" maxlength="20">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Categoria: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtEmail" value="<?=$categoria?>">
                        </div>
                    </div>
                    
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Foto: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="file" name="fleFoto" accept="image/jpeg, image/png, image/jpg">
                        </div>
                    </div>

                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Lista de Livros</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Categoria </td>
                    <td class="tblColunas destaque"> Preço </td>
                    <td class="tblColunas destaque"> Foto </td>
                    <td class="tblColunas destaque"> Opções </td>
                    
                </tr>
                
               <?php 
                    //Script para listar os dados do BD
                    $sql = "select * from livros order by id_livro desc";

                    //Executa no BD o script e guarda o retorno na variavel $select
                    $select = mysqli_query($conexao, $sql);

                    //converte o resultado do BD em um array de dados ($arrayUsuarios)
                    while ($arrayUsuarios = mysqli_fetch_assoc($select))
                    {
                    ?>
                        <tr id="tblLinhas">
                            <td class="tblColunas registros"><?=$arrayUsuarios['nome_livro']?></td>
                            <td class="tblColunas registros"><?=$arrayUsuarios['categoria']?></td>
                            <td class="tblColunas registros"><?=$arrayUsuarios['preco']?></td>
                            <td class="tblColunas registros">
                                <img src="arquivos/<?=$arrayUsuarios['foto']?>" class='foto'></td>
                           
                          
                            <td class="tblColunas registros">
                                <a href="form.php?modo=editar&id=<?=$arrayUsuarios['id_livro']?>">
                                    <img src="img/imgphp/edit.png" alt="Editar" title="Editar" class="editar">
                                </a>
                                <a onclick="return confirm('Deseja realmnte excluir?');" href="bd/excluirUsuario.php?modo=excluir&id=<?=$arrayUsuarios['id_livro']?>">
                                    <img src="img/imgphp/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                </a>
                                <img src="img/imgphp/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                            </td>
                        </tr>
                    <?php 
                    }
                    ?>            
            </table>
        </div>
    </body>
</html>