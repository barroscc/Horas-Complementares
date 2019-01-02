<?php

/* 
 * *** FUNCAO QUE RECEBE PARAMETRO POR POST Do FORMULARIO adiarFormatura.php***
 * *** ESTA FUNCAO ALTERA DATA DE FORMATURA DO ALUNO PARA SEMESTRE SELECIONADO NO HTML PELO COORDENADOR ***
 *  Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

$id=$_POST["nMatricula"];
$ano1=$_POST["nAno"];
$sem=$_POST["nSem"];
$forma="$ano1"."/"."$sem";

include_once 'ClassUser.php';
$conn= conectar();

$queryid5="UPDATE `horasComplementares`.`ALUNO` SET `provavelFormatura`='$forma' WHERE `matricula`= '$id'";
if($busca5 = mysqli_query($conn, $queryid5)){
   echo 'Operação realizada com sucesso. <br> Feche esta janela e atualize o browser.'; 
} else {
    echo 'erro';    
}

mysqli_close($conn);
