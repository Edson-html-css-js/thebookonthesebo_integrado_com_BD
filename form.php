<?php 

require_once('BD/conexao.php');

//Abre a conexão com o BD e guarda na variavel local $conexão
$conexao = conexaoMysql();

?>



<!DOCTYPE>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">

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
        <p class="sacola">
            Nenhum item adicionado a sacola
        </p>
       
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
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastre seu Livro </h1>
            </div>
            <div id="cadastroInformacoes">
                               
                <form action="BD/inserirUsuario.php" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome do Livro: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="" placeholder="Digite o Nome do livro!" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Autor: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNickName" placeholder="Digite o Autor!" value="">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Ano de Publicação: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtLogin" placeholder="Digite o Ano aqui!" value="">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Preço: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtSenha" placeholder="Digite o preço aqui!" value="" maxlength="20">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email do Proprietario: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" placeholder="EX: seu_nome@gmail.com" value="">
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
                        <h1> Lista de Usuários</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome do Livro </td>
                    <td class="tblColunas destaque"> Autor </td>
                    <td class="tblColunas destaque"> Ano de publicação </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
                <?php
                    //script para listar os dados do BD
                    $sql = "select * from tblusuario order by idUsuario desc";

                    //Executa no BD o script e guarda o retorno na variavel $select
                    $select = mysqli_query($conexao, $sql);

                    //converte o resultado do BD em um array de dados ( $arrayUsuarios)
                     while ($arrayUsuarios = mysqli_fetch_assoc($select)){

                     ?>
               
                        <tr id="tblLinhas">
                            <td class="tblColunas registros"><?=$arrayUsuarios['nome']?> </td>
                            <td class="tblColunas registros"><?=$arrayUsuarios['nickname']?></td>
                            <td class="tblColunas registros"><?=$arrayUsuarios['login']?></td>
                            <td class="tblColunas registros">
                                <img src="img/imgphp/edit.png" alt="Editar" title="Editar" class="editar">
                                <a href="bd/excluirUsuario.php?modo=excluir&id=<?=$arrayUsuarios['idusuario']?>">
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