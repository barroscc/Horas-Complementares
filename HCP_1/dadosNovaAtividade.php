<?php
/* 
 * Este arquivo adiciona nova atividade no banco. Recebe dados por POST de novaAtividade.php
 * *** ESTA FUNCAO ADICIONA NOVA ATIVIDADE SOMENTO NO BANCO E NAO NO MENU HTML DA INTERFACE DE NOVA SUBMISSAO DE AIVIDADE, O QUE DEVERÁ SER FEITO MANUALMENTE EM CASO DE ADICAO DE NOVAS ATIVIDADES NO CURRICULO ***
 * *** ESTA FUNCAO ESTÁ PRONTA PARA IMPLEMENTACAO FUTURA QUANDO O PROGRAMA ATENDERÁ FUNCOES DE SE TER VÁRIOS CURRÍCULOS E PODER CRIAR NOVAS ATIVIDADES ****
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

include_once 'ClassUser.php';
$conn= conectar();

$nNomeAtiv=$_POST["nNomeAtiv"];
$nClasseDefault=$_POST["nClasseDefault"];
$nUnidade=$_POST["nUnidade"];
$nValorUnidade=$_POST["nValorUnidade"];
$nMaxHoras=$_POST["nMaxHoras"];

$sql = "INSERT INTO horasComplementares.ATIVIDADE (nomeAtividade,classeDefault,unidade,valorHoraUnidade,maxHoras) "
        . "VALUES ('$nNomeAtiv', '$nClasseDefault', '$nUnidade','$nValorUnidade','$nMaxHoras')";
if (mysqli_query($conn, $sql)) {
     echo "Dados registrados com sucesso ";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
