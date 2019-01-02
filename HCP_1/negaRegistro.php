<?php
/* 
 * *** METODO QUE REJEITA REGISTROS DE NOVOS USUÁRIOS ***
 *  Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
$IdSub=$_GET["var"];

include_once 'ClassUser.php';
$conn= conectar();

$queryNegar="DELETE FROM `horasComplementares`.`USER` WHERE `Id`='$IdSub'";
IF(mysqli_query($conn, $queryNegar)){
    echo 'Registro negado e apagado. Feche esta janela e atualise a página principal';
}ELSE{
    echo 'FALHA AO ACESSAR O BANCO DE DADOS';
}
mysqli_close($conn);
