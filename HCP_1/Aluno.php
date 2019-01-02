<!DOCTYPE html>
<!--
***ESTE É O AMBIENTE DE TRABALHO DO ALUNO***
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
            <?php echo $dado2[2] ?> <?php $idAluno= $dado[0]; ?> 
            <form method="post" id="iRegistro" name="nRegistro" action="NovaSubAtiv.php" target="_blank" >
                 Matrícula: <input type="text" readonly="" name="nIdAluno" value=<?php echo $idAluno?> hidden="" > <?php echo $idAluno?> 
            <br> <a href="NovaSubAtiv.html" target="_blank"><input type="Submit" value="Submeter Novo Certificado de Atividade Complementar" name="bNovaSubAtiv" /></a>
            </form>
            <figure class="headerUser1">
                <img src="_imagens/ComputacaoUfpel-menor.png">
            </figure >
            <figure class="headerUser2" >
                <img src="_imagens/UFPEL-menor.JPG">
            </figure>
        </header>
        <hr>
        
<?php
        include_once 'ClassUser.php';
        $conn= conectar();
//BUSCA DADOS DE REQUERIMENTOS AINDA NÃO ANALISADOS E COLOCA EM UM ARRAY        
        $queryid9="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where requerente=$idAluno AND estadoAtual='Em Análise'";
$busca9 = mysqli_query($conn, $queryid9);
//Soma valores em análise
while($dado9 = mysqli_fetch_array($busca9)){
$totaisSol+= $dado9[7];
}   
//busca dados de todos os registros do aluno em qualquer estado
        $queryid3="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where requerente=$idAluno";
$busca3 = mysqli_query($conn, $queryid3);
//soma diferentes dados em categorias para montar painel de resumo do aluno
while($dado3 = mysqli_fetch_array($busca3)){
    if ($dado3[9]=="Ens") {
$HoCalEns += $dado3[5];
$HoSolEns += $dado3[7];
$HoAprEns += $dado3[8];
    }
    if ($dado3[9]=="Pesq") {
$HoCalPesq += $dado3[5];
$HoSolPesq += $dado3[7];
$HoAprPesq += $dado3[8];
    }
    if ($dado3[9]=="Ext") {
$HoCalExt += $dado3[5];
$HoSolExt += $dado3[7];
$HoAprExt += $dado3[8];
    }
}
//calcula excedente horas como horas livres
if ($HoAprEns>120) {$HoLivEns=$HoAprEns-120;$HoAprEns=120;}
if ($HoAprPesq>120) {$HoLivPesq=$HoAprPesq-120;$HoAprPesq=120;}
if ($HoAprExt>120) {$HoLivExt=$HoAprExt-120;$HoAprExt=120;}
if ($HoLivEns>$HoLivPesq){
    $maiorDefault="ENSINO";$maior=$HoLivEns;
} else {$maiorDefault="PESQUISA";$maior=$HoLivPesq;}
if ($maior<$HoLivExt){$maiorDefault="EXTENSÃO";} 
//calcula valores em porcentagem 
$porcentoEns=$HoAprEns/1.2;
$porcentoPesq=$HoAprPesq/1.2;
$porcentoExt=$HoAprExt/1.2;
//calcula total de horas e porcentagem
$totaisAprov = ($HoAprEns + $HoAprPesq + $HoAprExt);
$porcentoAprov= ($totaisAprov/3.2);
$porcentoSol= ($totaisSol/3.2);
$totaisLiv = ($HoLivEns + $HoLivPesq + $HoLivExt);
if ($totaisLiv>217) {$totaisLiv=217;}
$porcentoLiv= ($totaisLiv/2.17);

?>
<!-- MOSTRA RESUMO DO ALUNO -->
        <div id="dHorasDetalhe">
         Horas Complementares<br><br>
            Ensino &nbsp;&nbsp;&nbsp; <input type="text" id="iEns" size="5"  readonly="" value="<?php echo $HoAprEns; ?>" > <input type="range" id="iEnsRange" min="0" max="100" disabled="" value="<?php echo $porcentoEns; ?>" ><br>
            Pesquisa &nbsp; <input type="text" id="iPesq" size="5" readonly="" value="<?php echo $HoAprPesq; ?>" > <input type="range" id="iPesqRange" min="0" max="100" value="<?php echo $porcentoPesq; ?>" disabled><br>
            Extensão &nbsp; <input type="text" id="iExt" size="5" readonly="" value="<?php echo $HoAprExt; ?>" > <input type="range" id="iExtRange" min="0" max="100" value="<?php echo $porcentoExt; ?>" disabled><br><br>
      
            Totais Aprovados &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Totais em Análise<br>
            &nbsp;<input type="text" size="5" readonly="" value="<?php echo $totaisAprov;?>"> <input type="range" id="iAproRange" min="0" max="100" value="<?php echo $porcentoAprov;?>" disabled> &nbsp;<input type="text" size="5" readonly="" value=<?php echo $totaisSol; ?> > <input type="range" id="iAnaRange" min="0" max="100" value= <?php echo $porcentoSol; ?> disabled><br>
            Horas Livres <br><input type="text" size="10" placeholder="Ensino" readonly="" value="<?php echo $maiorDefault; ?>" > &nbsp; <input type="text" size="5" readonly="" value="<?php echo $totaisLiv; ?>" > <input type="range" id="iAnaRange" min="0" max="100" value="<?php echo $porcentoLiv; ?>" disabled>
        </div>
<hr>
<!-- MOSTRA TODAS AS SUBMISSÕES DO ALUNO -->
        <div id="dTabelaAluno">
            
<?php        
echo '<table>';

echo '<tr class="dif">';

echo '<td> Data </td>';
echo '<td> Atividade </td>';
echo '<td> Situação </td>';
echo '<td> Horas Calculadas </td>';
echo '<td> Horas Soliciadas </td>';
echo '<td> Horas Aprovadas </td>';
echo '<td> Classe Default </td>';
//echo '<td> EDITAR </td>';

echo '</tr>';

// Armazena os dados da consulta em um array 
$queryid4="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where requerente=$idAluno";
$busca4 = mysqli_query($conn, $queryid4);

while($dado4 = mysqli_fetch_array($busca4)){

echo '<tr>';

echo '<td>'.$dado4[0].'</td>';
echo '<td>'.$dado4[1].'</td>';
echo '<td>'.$dado4[3].'</td>';
echo '<td>'.$dado4[5].'</td>';
echo '<td>'.$dado4[7].'</td>';
echo '<td>'.$dado4[8].'</td>';
echo '<td>'.$dado4[9].'</td>';

echo '</tr>';
}
echo '</table>';
mysqli_close($conn);
?>
        </div>
  <hr>
        
        