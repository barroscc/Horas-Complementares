<!DOCTYPE html>
<!--
***ESTE É O AMBIENTE DE TRABALHO DO COORDENADOR***
Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
-->
<html>
    <head>
        <title>Horas Complementares Aluno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body class="user">
        <header id="hAluno" class="headerText">
            <br>
            <?php echo $dado[2]; ?> <br>
           Coordenador <?php echo $dado2[2] ?> <?php $idAdmin= $dado[0]; ?> 
            <form method="post" id="iRegistro" name="nRegistro" action="buscarAluno3.php" target="_blank" >
                SIAPE: <?php echo $idAdmin?> 
            <br> <a href="buscarAluno.php" target="_blank"><input type="Submit" value="BUSCAR ALUNO" name="bNovaSubAtiv" /></a>
            </form>
            <figure class="headerUser1">
                <img src="_imagens/ComputacaoUfpel-menor.png">
            </figure >
            <figure class="headerUser2" >
                <img src="_imagens/UFPEL-menor.JPG">
            </figure>
        </header>
      
<?php
        include_once 'ClassUser.php';
        $conn= conectar();
//verifica semestre corrente
        $ano=date('Y');
        $mes=date('m');
    if ($mes<7) {
            $sem=1;
    } else {
            $sem=2;
      }
        $ProvForm=$ano."/".$sem;
//busca alunos que irão se formar no semestre corrente
     echo "Semestre Corrente ".$ProvForm;   
        $queryid5="UPDATE `horasComplementares`.`ALUNO` SET `provavelFormatura`='formando' WHERE `provavelFormatura`= '$ProvForm'";
$busca5 = mysqli_query($conn, $queryid5);

?>
<!-- mostra formandos em uma tabela -->        
        <div id="dTabelaAdmin">
        <fieldset class="admin" id="admin">
                    <legend>Prováveis Formandos</legend>     
<?php        
echo '<table>';

echo '<tr class="dif">';

echo '<td> Matricula </td>';
echo '<td> Nome </td>';
echo '<td> Curso </td>';
echo '<td> Curriculo </td>';
echo '<td> AÇÕES </td>';

echo '</tr>';

// Armazena os dados da consulta em um array 
$queryid4="SELECT A.id, A.nome, B.curso, B.curriculo FROM USER as A JOIN ALUNO as B on A.id = B.matricula where B.provavelFormatura='formando'";
$busca4 = mysqli_query($conn, $queryid4);

while($dado4 = mysqli_fetch_array($busca4)){

echo '<tr>';

echo '<td>'.$dado4[0].'</td>';
echo '<td>'.$dado4[1].'</td>';
echo '<td>'.$dado4[2].'</td>';
echo '<td>'.$dado4[3].'</td>';
echo '<td><a href="buscarAluno2.php?var='.$dado4[0].'" target="_blank"><input type="button" size="5" name="$dado4[0]" value="Abrir"></a>'
        . '<a href="adiarFormatura.php?var='.$dado4[0].'" target="_blank"><input type="button" size="5" name="$dado4[0]" value="Adiar Formatura"></a>'
        . '<a href="removerFormando.php?var='.$dado4[0].'" target="_blank"><input type="button" size="5" name="$dado4[0]" value="Remover"></a>';
  
echo '</tr>';
}
echo '</table>';
mysqli_close($conn);
?>



