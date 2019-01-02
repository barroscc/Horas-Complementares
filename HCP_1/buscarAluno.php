
<!-- BUSCA ALUNO DO ADMINISTRADOR -->

<html>
    <head>
        <title>Horas Complementares Aluno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body class="user">
        <header id="hAluno" class="headerText">
            <fieldset class="busca" id="admin">
                <legend>Buscar Aluno</legend>  
                    <form method="post" id="iBusca" name="nBusca" >
                        <input type="text" name="nMatricula" placeholder="Matrícula do Aluno">
            <br> 
 <a ><input type="Submit" value="SUBMETER" name="nSubMatricula" /></a>
                    </form>
            </fieldset>
        </header>
    
        <figure class="headerUser1">
                <img src="_imagens/ComputacaoUfpel-menor.png">
            </figure >
            <figure class="headerUser2" >
                <img src="_imagens/UFPEL-menor.JPG">
            </figure>
<?php
/* 
 * *** BUSCA ALUNO DO ADMINISTRADOR+++
 *  Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
include_once 'ClassUser.php';
$conn= conectar();

if (($matricula = $_POST["nMatricula"])==0) {
    //echo $matricula;
}elseif ($matricula!=1) {   // echo $matricula;  
    $queryid1="SELECT * FROM horasComplementares.USER where id='$matricula'";
    $busca1 = mysqli_query($conn, $queryid1);
    $dado = mysqli_fetch_array($busca1);
    $matricula2=$dado[0];
          if ($matricula2==""){
            echo '<br><br><br><br><br>Aluno não cadastrado';   
    }else {
        echo '<br><br><br><br><br><a href="mensagem.php?var='.$matricula2.'" ><input type="button" size="5" name="$dado4[0]" value="ENVIAR MENSAGEM"></a>
    <div id="dDadosAluno">
        <fieldset class="admin" id="admin">
                    <legend>Dados Cadastrais</legend>';
               
echo '<table>';

echo '<tr class="dif">';

echo '<td> Matrícula </td>';
echo '<td> Nome </td>';
echo '<td> e-mail </td>';
echo '<td> Telefone </td>';
echo '<td> Curso </td>';
echo '<td> Currículo </td>';

echo '</tr>';

// Armazena os dados da consulta em um array 
$queryid4="SELECT * FROM horasComplementares.User where id=$matricula";
$busca4 = mysqli_query($conn, $queryid4);
$queryid5="SELECT * FROM horasComplementares.ALUNO where matricula=$matricula";
$busca5 = mysqli_query($conn, $queryid5);
$dado5 = mysqli_fetch_array($busca5);

while($dado4 = mysqli_fetch_array($busca4)){

echo '<tr>';

echo '<td>'.$dado4[0].'</td>';
echo '<td>'.$dado4[2].'</td>';
echo '<td>'.$dado4[3].'</td>';
echo '<td>'.$dado4[4].'</td>';
echo '<td>'.$dado5[2].'</td>';
echo '<td>'.$dado5[3].'</td>';

echo '</tr>';
}
echo '</table>';
echo '</fieldset>';
echo '</div>';

//Resumo do aluno
 $queryid9="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where requerente=$matricula AND estadoAtual='Em Análise'";
$busca9 = mysqli_query($conn, $queryid9);

while($dado9 = mysqli_fetch_array($busca9)){
$totaisSol+= $dado9[7];
}    
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

$porcentoEns=$HoAprEns/1.2;
$porcentoPesq=$HoAprPesq/1.2;
$porcentoExt=$HoAprExt/1.2;

$totaisAprov = ($HoAprEns + $HoAprPesq + $HoAprExt);
$porcentoAprov= ($totaisAprov/3.2);
//$totaisSol= ($HoSolEns + $HoSolPesq + $HoSolExt)-($HoAprEns + $HoAprPesq + $HoAprExt);
$porcentoSol= ($totaisSol/3.2);
$totaisLiv = ($HoLivEns + $HoLivPesq + $HoLivExt);
if ($totaisLiv>217) {$totaisLiv=217;}
$porcentoLiv= ($totaisLiv/2.17);
     
?>
            <div id="dDadosAluno">
            <fieldset class="admin" id="admin">
                    <legend>Resumo</legend>
   
         Horas Complementares<br><br>
            Ensino &nbsp;&nbsp;&nbsp; <input type="text" id="iEns" size="5"  readonly="" value="<?php echo $HoAprEns; ?>" > <input type="range" id="iEnsRange" min="0" max="100" disabled="" value="<?php echo $porcentoEns; ?>" ><br>
            Pesquisa &nbsp; <input type="text" id="iPesq" size="5" readonly="" value="<?php echo $HoAprPesq; ?>" > <input type="range" id="iPesqRange" min="0" max="100" value="<?php echo $porcentoPesq; ?>" disabled><br>
            Extensão &nbsp; <input type="text" id="iExt" size="5" readonly="" value="<?php echo $HoAprExt; ?>" > <input type="range" id="iExtRange" min="0" max="100" value="<?php echo $porcentoExt; ?>" disabled><br><br>
      
            Totais Aprovados &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Totais em Análise<br>
            &nbsp;<input type="text" size="5" readonly="" value="<?php echo $totaisAprov;?>"> <input type="range" id="iAproRange" min="0" max="100" value="<?php echo $porcentoAprov;?>" disabled> &nbsp;<input type="text" size="5" readonly="" value=<?php echo $totaisSol; ?> > <input type="range" id="iAnaRange" min="0" max="100" value= <?php echo $porcentoSol; ?> disabled><br>
            Horas Livres <br><input type="text" size="10" placeholder="Ensino" readonly="" value="<?php echo $maiorDefault; ?>" > &nbsp; <input type="text" size="5" readonly="" value="<?php echo $totaisLiv; ?>" > <input type="range" id="iAnaRange" min="0" max="100" value="<?php echo $porcentoLiv; ?>" disabled>
        </fieldset>
    </div>     
<?php
//tabela de submissões
        echo '<div id="dDadosAluno">';
echo '<fieldset class="admin" id="admin">
                    <legend>Submissões</legend>';
     echo '<table>';

echo '<tr class="dif">';

echo '<td> Data </td>';
echo '<td> Atividade </td>';
echo '<td> Situação </td>';
echo '<td> Horas Calculadas </td>';
echo '<td> Horas Soliciadas </td>';
echo '<td> Horas Aprovadas </td>';
echo '<td> Classe Default </td>';
echo '<td> Instituição </td>';
echo '<td> Certificado </td>';

echo '</tr>';

// Armazena os dados da consulta em um array 
$queryid7="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where requerente=$matricula";
$busca7 = mysqli_query($conn, $queryid7);

while($dado7 = mysqli_fetch_array($busca7)){

echo '<tr>';

echo '<td>'.$dado7[0].'</td>';
echo '<td>'.$dado7[1].'</td>';
echo '<td>'.$dado7[3].'</td>';
echo '<td>'.$dado7[5].'</td>';
echo '<td>'.$dado7[7].'</td>';
echo '<td>'.$dado7[8].'</td>';
echo '<td>'.$dado7[9].'</td>';
echo '<td>'.$dado7[11].'</td>';
echo '<td><iframe src="'.$dado7[10].'" width="300" height="100"></iframe></td>';

echo '</tr>';

}
echo '</table>';   
  echo '</fieldset>'; 
  echo '</div>';
    }
    }

mysqli_close($conn);
