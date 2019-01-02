<?php
/* 
 * *** altera dado provavelFormatura para jubilado, abandono ou trancamento de acordo com campo select de formulário ***
 * recebe dados POST de formulario de removerFormando.php
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

include_once 'ClassUser.php';
$conn= conectar();

$id=isset($_POST["nMatricula"])?$_POST["nMatricula"]:$_GET["var"]; 
$motivo=isset($_POST["nMotivo"])?$_POST["nMotivo"]:$_GET["var2"];  

$queryid5="UPDATE `horasComplementares`.`ALUNO` SET `provavelFormatura`='$motivo' WHERE `matricula`= '$id'";
if($busca5 = mysqli_query($conn, $queryid5)){
   echo 'Operação realizada com sucesso. <br> Feche esta janela e atualize o browser.'; 
} else {
    echo 'erro';    
}
mysqli_close($conn);

