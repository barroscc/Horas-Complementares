<?php

/* 
 * *** FUNCAO QUE RECEBE PARAMETRO POR GET DE UM BOTAO DE TABELA ***
 * *** ESTA FUNCAO ALTERA ESTADO DE UMA SUBMISSÃO PARA APROVADA NO DB ***
 *  Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

$IdSub=$_GET["var"];
$IdSub2=$_GET["var2"];

include_once 'ClassUser.php';
$conn= conectar();
$queryid4="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where dataSubmis='$IdSub'";
$busca4 = mysqli_query($conn, $queryid4);
$dado4 = mysqli_fetch_array($busca4);
 $queryid5="UPDATE `horasComplementares`.`REGISTRO_ATIVIDADE` SET `horasAprovadas`=$IdSub2 WHERE `dataSubmis`='$IdSub'";
        mysqli_query($conn, $queryid5);
        $queryid6="UPDATE `horasComplementares`.`REGISTRO_ATIVIDADE` SET `estadoAtual`='Aprovado' WHERE `dataSubmis`='$IdSub'";
        mysqli_query($conn, $queryid6);
        
        echo 'Volte e atualize sua pagina no seu browser';
        
        mysqli_close($conn);

