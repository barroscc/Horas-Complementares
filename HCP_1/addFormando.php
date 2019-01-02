<?php

/* 
 * *** FUNCAO QUE RECEBE PARAMETRO POR GET DE UM BOTAO DE TABELA ***
 * *** ESTA FUNCAO ALTERA DATA DE FORMATURA DO ALUNO PARA SEMESTRE CORRENTE NO DB ***
 *  Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

$id=$_GET["var"];

include_once 'ClassUser.php';
$conn= conectar();

$queryid5="UPDATE `horasComplementares`.`ALUNO` SET `provavelFormatura`='formando' WHERE `matricula`= '$id'";
$busca5 = mysqli_query($conn, $queryid5);

mysqli_close($conn);

echo 'Operação realizada com sucesso. <br> Feche esta janela e atualize o browser.';
