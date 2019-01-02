<?php

/* 
 * metodo que recebe parametro via get
 * *** marca como indeferido uma submissão de horas complementares ***
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

$IdSub=$_GET["var"];

include_once 'ClassUser.php';
$conn= conectar();

$queryid="UPDATE `horasComplementares`.`REGISTRO_ATIVIDADE` SET `estadoAtual`='Indeferido' WHERE `dataSubmis`='$IdSub'";
if(mysqli_query($conn, $queryid)){
    echo "Banco de dados atualizado com sucesso! <br> Volte e atualize sua página no navegador."; 
}else {
    echo 'Erro ao alterar banco de dados';
}

mysqli_close($conn);



