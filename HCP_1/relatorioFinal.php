<?php
/*
 * *** INTERFACE QUE MOSTRA PRÉVIA DO RELATÓRIO FINAL ANTES DO ARQUIVAMENTO EM PDF ***
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
include_once 'ClassUser.php';
$conn= conectar();

$nome=$_POST["nNome"];
$matricula=$_POST["nMat"];
$curso=$_POST["nCur"];
$ens=$_POST["nEns"];
$pes=$_POST["nPes"];
$ext=$_POST["nExt"];
$complementar=$ens+$pes+$ext;//$_POST["nCom"];
$livres=$_POST["nLiv"];
$tipo=$_POST["nTipo"];

if ($tipo=="ENSINO") {$tipo2="Ens";
}elseif ($tipo=="PESQUISA") {$tipo2="Pesq";
}else{$tipo2="Ext";}
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
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Universidade Federal de Pelotas - UFPel <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Centro de Desenvolvimento Tecnológico - CDTec<br>&nbsp;&nbsp;RELATÓRIO DE HORAS COMPLEMENTARES E LIVRES<br> <br>
             
            Nome: <?php echo $nome; ?> <br>
            <?php $idAluno= $matricula; ?> 
                Matrícula: <?php echo $matricula?> <br>
                Curso: <?php echo $curso ?> 
           <figure class="headerUser1">
                <img src="_imagens/ComputacaoUfpel-menor.png">
            </figure >
            <figure class="headerUser2" >
                <img src="_imagens/UFPEL-menor.JPG">
            </figure>
        </header>               
        <hr>
        
        <div id="dHorasDetalhe">
            <input type="text" id="iNome" name="nNome"size="5" hidden=""  value="<?php echo $nome; ?>" ><input type="text" id="iMat" name="nMat"size="5" hidden=""  value="<?php echo $idAluno; ?>" ><input type="text" id="iCur" name="nCur"size="5" hidden=""  value="<?php echo $curso; ?>" > 
<!-- RESUMO FINAL DO ALUNO -->
         Horas Complementares Aprovadas<br><br>
            Ensino: <?php echo $ens; ?> horas<br>
            Pesquisa: <?php echo $pes; ?> horas<br>
            Extensão: <?php echo $ext; ?> horas<br><br>
      
            Total de Horas Complementares: <?php echo $complementar;?> horas<br>
            Total de Horas Livres: <?php echo $livres; ?> horas --- Tipo Principal <?php echo $tipo; ?>
            <hr>
            
<?php
//tabela de submissões aprovadas do tipo predominante
echo '<fieldset class="admin" id="admin">
                    <legend>Submissões</legend>';
     echo '<table>';

echo '<tr class="dif">';

echo '<td> Data </td>';
echo '<td> Atividade </td>';
echo '<td> Horas Aprovadas </td>';
echo '<td> Classe Default </td>';
echo '<td> Instituição </td>';

echo '</tr>';

// Armazena os dados da consulta em um array 
$queryid7="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where requerente='$matricula' AND estadoAtual='Aprovado' AND tipo='$tipo2'" ;
$busca7 = mysqli_query($conn, $queryid7);

while($dado7 = mysqli_fetch_array($busca7)){

echo '<tr>';

echo '<td>'.$dado7[0].'</td>';
echo '<td>'.$dado7[1].'</td>';
echo '<td>'.$dado7[8].'</td>';
echo '<td>'.$dado7[9].'</td>';
echo '<td>'.$dado7[11].'</td>';

echo '</tr>';
}
echo '</table>';   
  echo '</fieldset>'; 
?>
        </fieldset> 
    </div>
        <hr><br>
<!-- FIM DO CERTIFICADO PARA DRA E INICIO CERTIFICADO PARA O ALUNO -->        
        <hr>

    <body class="user">
        <header id="hAluno" class="headerText">
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CERTIFICADO <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Universidade Federal de Pelotas - UFPel <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Centro de Desenvolvimento Tecnológico - CDTec<br>&nbsp;&nbsp;RELATÓRIO DE HORAS COMPLEMENTARES E LIVRES<br> <br>
             
            Nome: <?php echo $nome; ?> <br>
            <?php $idAluno= $matricula; ?> 
                Matrícula: <?php echo $idAluno?> <br>
                Curso: <?php echo $curso ?> 
           <figure class="headerUser1">
                <img src="_imagens/ComputacaoUfpel-menor.png">
            </figure >
            <figure class="headerUser2" >
                <img src="_imagens/UFPEL-menor.JPG">
            </figure>
        </header>               
        <hr>
        
        <div id="dHorasDetalhe">
            
                <input type="text" id="iNome" name="nNome"size="5" hidden=""  value="<?php echo $nome; ?>" ><input type="text" id="iMat" name="nMat"size="5" hidden=""  value="<?php echo $idAluno; ?>" ><input type="text" id="iCur" name="nCur"size="5" hidden=""  value="<?php echo $curso; ?>" >   
<!-- RESUMO FINAL DO ALUNO -->        
                Horas Complementares Aprovadas<br><br>
            Ensino: <?php echo $ens; ?> horas<br>
            Pesquisa: <?php echo $pes; ?> horas<br>
            Extensão: <?php echo $ext; ?> horas<br><br>
      
            Total de Horas Complementares: <?php echo $complementar;?> horas<br>
            Total de Horas Livres: <?php echo $livres; ?> horas --- Tipo Principal <?php echo $tipo; ?>
            <hr>
            
<?php
//tabela de submissões COM TODOS OS TIPOS aprovados
echo '<fieldset class="admin" id="admin">
                    <legend>Submissões</legend>';
     echo '<table>';

echo '<tr class="dif">';

echo '<td> Data </td>';
echo '<td> Atividade </td>';
echo '<td> Horas Aprovadas </td>';
echo '<td> Classe Default </td>';
echo '<td> Instituição </td>';

echo '</tr>';

// Armazena os dados da consulta em um array 
$queryid8="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where requerente='$matricula' AND estadoAtual='Aprovado' " ;
$busca8 = mysqli_query($conn, $queryid8);

while($dado8 = mysqli_fetch_array($busca8)){

echo '<tr>';

echo '<td>'.$dado8[0].'</td>';
echo '<td>'.$dado8[1].'</td>';
echo '<td>'.$dado8[8].'</td>';
echo '<td>'.$dado8[9].'</td>';
echo '<td>'.$dado8[11].'</td>';

echo '</tr>';
}
echo '</table>';   
  echo '</fieldset>'; 
?>
                      
        </fieldset> 
    </div>
        <hr>
        <div>
            <form name="nFinalizar" action="finalizar.php" method="POST">
                <input type="submit" value="FINALIZAR" name="nFinal" >
            </form>
        </div>
 
<?php

mysqli_close($conn);


