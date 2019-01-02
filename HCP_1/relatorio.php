<?php

/* 
 * *** METODO QUE GERA RELATORIO DO ALUNO EDITAVEL PELO COORDENADOR ***
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

include_once 'ClassUser.php';
$conn= conectar();

$matricula=$_GET["var"];

$queryid1="SELECT * FROM horasComplementares.USER where id='$matricula'";
    $busca1 = mysqli_query($conn, $queryid1);
    $dado = mysqli_fetch_array($busca1);
    
$queryid2="SELECT * FROM horasComplementares.ALUNO where matricula='$matricula'";
    $busca2 = mysqli_query($conn, $queryid2);
    $dado2 = mysqli_fetch_array($busca2);
    
$queryid3="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where requerente=$matricula";
    $busca3 = mysqli_query($conn, $queryid3);

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
if ($maior<$HoAprExt){$maiorDefault="EXTENSÃO";}
//formata variavel $tipo para acessar o banco "tipo"
if ($maiorDefault=="ENSINO") {$tipo="Ens";
}elseif ($maiorDefault=="PESQUISA") {$tipo="Pesq";
}else{$tipo="Ext";} 

$porcentoEns=$HoAprEns/1.2;
$porcentoPesq=$HoAprPesq/1.2;
$porcentoExt=$HoAprExt/1.2;

$totaisAprov = ($HoAprEns + $HoAprPesq + $HoAprExt);
$porcentoAprov= ($totaisAprov/3.2);
$totaisSol= ($HoSolEns + $HoSolPesq + $HoSolExt)-($HoAprEns + $HoAprPesq + $HoAprExt);
$porcentoSol= ($totaisSol/3.2);
$totaisLiv = ($HoLivEns + $HoLivPesq + $HoLivExt);
if ($totaisLiv>217) {$totaisLiv=217;}
$porcentoLiv= ($totaisLiv/2.17);
?>

<html>
    <head>
        <title>Horas Complementares Aluno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body class="user">
        <header id="hAluno" class="headerText">
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Universidade Federal de Pelotas - UFPel <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Centro de Desenvolvimento Tecnológico - CDTec<br> <br>
             
            Nome: <?php echo $dado[2]; ?> <br>
            <?php $idAluno= $dado[0]; ?> 
                Matrícula: <?php echo $idAluno?> <br>
                Curso: <?php echo $dado2[2] ?> 
           <figure class="headerUser1">
                <img src="_imagens/ComputacaoUfpel-menor.png">
            </figure >
            <figure class="headerUser2" >
                <img src="_imagens/UFPEL-menor.JPG">
            </figure>
        </header>               
        <hr>
        
        <div id="dHorasDetalhe">
            <form method="post" action="relatorioFinal.php">
                <input type="text" id="iNome" name="nNome"size="5" hidden=""  value="<?php echo $dado[2]; ?>" ><input type="text" id="iMat" name="nMat"size="5" hidden=""  value="<?php echo $idAluno; ?>" ><input type="text" id="iCur" name="nCur"size="5" hidden=""  value="<?php echo $dado2[2]; ?>" >   
         Horas Complementares<br><br>
         Ensino &nbsp;&nbsp;&nbsp; <input type="text" name="nEns" id="iEns" size="5"   value="<?php echo $HoAprEns; ?>" > <input type="range" id="iEnsRange" min="0" max="100" disabled="" value="<?php echo $porcentoEns; ?>" ><br>
         Pesquisa &nbsp; <input type="text" id="iPesq" name="nPes" size="5"  value="<?php echo $HoAprPesq; ?>" > <input type="range" id="iPesqRange" min="0" max="100" value="<?php echo $porcentoPesq; ?>" disabled><br>
         Extensão &nbsp; <input type="text" id="iExt" name="nExt" size="5"  value="<?php echo $HoAprExt; ?>" > <input type="range" id="iExtRange" min="0" max="100" value="<?php echo $porcentoExt; ?>" disabled><br><br>
            Totais Aprovados <br>
            &nbsp;<input type="text" size="5" name="nCom"  value="<?php echo $totaisAprov;?>"> <input type="range" id="iAproRange" min="0" max="100" value="<?php echo $porcentoAprov;?>" disabled> &nbsp;<br>
            Horas Livres <br><input type="text" size="10" name="nTipo" placeholder="Ensino"  value="<?php echo $maiorDefault; ?>" > &nbsp; <input type="text" size="5" name="nLiv" value="<?php echo $totaisLiv; ?>" > <input type="range" id="iAnaRange" min="0" max="100" value="<?php echo $porcentoLiv; ?>" disabled>
            <hr>
                <input type="submit" value="FINALIZAR">
            </form>
            
<?php
//tabela de submissões
echo '<fieldset class="admin" id="admin">
                    <legend>Submissões</legend>';
     echo '<table>';

echo '<tr class="dif">';

echo '<td> Data </td>';
echo '<td> Atividade </td>';
echo '<td> Horas Aprovadas </td>';
echo '<td> Classe Default </td>';
echo '<td> Instituição </td>';
echo '<td> Certificado </td>';

echo '</tr>';

// Armazena os dados da consulta em um array 
$queryid7="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where requerente=$matricula AND estadoAtual='Aprovado' AND tipo='$tipo'" ;
$busca7 = mysqli_query($conn, $queryid7);

while($dado7 = mysqli_fetch_array($busca7)){

echo '<tr>';

echo '<td>'.$dado7[0].'</td>';
echo '<td>'.$dado7[1].'</td>';
echo '<td>'.$dado7[8].'</td>';
echo '<td>'.$dado7[9].'</td>';
echo '<td>'.$dado7[11].'</td>';
echo '<td><iframe src="'.$dado7[10].'" width="300" height="100"></iframe></td>';

echo '</tr>';
}
echo '</table>';   
  echo '</fieldset>'; 

mysqli_close($conn);
?>
                      
        </fieldset> 
    </div>
 



       
        

    