<?php
/* 
 * *** FUNCAO QUE RECEBE PARAMETRO POR GET DE UM BOTAO DE TABELA ***
 * *** ESTA FUNCAO ALTERA ESTADO DO REGISTRO PARA APROVADO NO DB ***
 *  Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
$IdSub=$_GET["var"];

include_once 'ClassUser.php';
$conn= conectar();

$queryAceitar="UPDATE `horasComplementares`.`USER` SET `registroAceito`=1 WHERE `id`='$IdSub'";
mysqli_query($conn, $queryAceitar);

mysqli_close($conn);
        
echo 'Registro aceito. Feche esta janela e atualise a página principal';
        

