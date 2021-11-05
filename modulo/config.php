<?php
/*****************************************************
 * Objetivo: Arquivo de configuração de variaveis e constantes de projeto
 * data: 03/11
 * Autor: Edson lucas
 *  
 * ***************************************************/
//mensagen do sistema

date_default_timezone_set('America/Sao_Paulo');

const REGISTRO_SALVO = "<script>
                                alert('Registro salvo com sucesso no banco de Dados!');
                                window.location.href = '../form.php';
                        </script> ";



const ERRO_BD = "<script>
                          alert('Não foi posivel enviar os dados para o Banco de Dados!');
                          window.history.back()';
             </script> ";



const REGISTRO_EXCLUIDO = "<script>
             alert('Registro Excluido com sucesso do Banco de Dados!');
             window.location.href = '../form.php';
             </script> ";



?>

