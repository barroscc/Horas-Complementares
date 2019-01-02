<!DOCTYPE html>
<!--
***ESTE É O AMBIENTE DE TRABALHO DO ADMINISTRADOR***
Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
-->
<html>
    <head>
        <title>Horas Complementares Administrador</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body class="user">
        <header id="hAluno" class="headerText">
            <br>
            <?php echo $dado[2]; ?> <br>
           Administrador <?php echo $dado2[2] ?> <?php $idAdmin= $dado[0]; ?> 
            <form method="post" id="iRegistro" name="nRegistro" action="buscarAluno.php" target="_blank" >
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
?>
        
        <div id="dTabelaAdmin">
            <fieldset class="admin" id="admin">
                    <legend>Certificados a Analisar</legend>     

<?php        
echo '<table>';

echo '<tr class="dif">';

echo '<td> Data </td>';
echo '<td> Atividade </td>';
echo '<td> Aluno </td>';
echo '<td> Horas Calculadas </td>';
echo '<td> Horas Soliciadas </td>';
echo '<td> Instituição </td>';
echo '<td> Certificado </td>';
//echo '<td> Classe Default </td>';
echo '<td> AÇÕES </td>';

echo '</tr>';

// Armazena os dados da consulta em um array 
$queryid4="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where estadoAtual='Em Análise'";
$busca4 = mysqli_query($conn, $queryid4);

while($dado4 = mysqli_fetch_array($busca4)){

echo '<tr>';

echo '<td>'.$dado4[0].'</td>';
echo '<td>'.$dado4[1].'</td>';
echo '<td>'.$dado4[2].'</td>';
echo '<td>'.$dado4[5].'</td>';
echo '<td>'.$dado4[7].'</td>';
echo '<td>'.$dado4[11].'</td>';
echo '<td><iframe src="'.$dado4[10].'" width="500" height="120"></iframe></td>';
//echo '<td>'.$dado4[9].'</td>';
echo '<td><a href="editSubAdmin.php?var='.$dado4[0].'&var2=_alunos/'.$dado4[0].'/'.$dado4[10].'" target="_blank"><input type="button" size="5" name="$dado4[0]" value="Editar"></a>'
        . '<a href="aprovarSub.php?var='.$dado4[0].'&var2='.$dado4[7].'" target="_blank"><input type="button" size="5" name="$dado4[0]" value="Aprovar"></a></td>';


echo '</tr>';

}
echo '</table>';
?>
            </fieldset>
        </div>
        
        <div id="dTabelaAdmin2">
            <fieldset class="admin" id="admin">
                <legend>Novos Acessos a Validar</legend>     

<?php        
echo '<table>';

echo '<tr class="dif">';

echo '<td> id </td>';
echo '<td> Nível </td>';
echo '<td> Nome </td>';
echo '<td> e-mail </td>';
echo '<td> Telefone </td>';
//echo '<td> Certificado </td>';
//echo '<td> Classe Default </td>';
echo '<td> AÇÕES </td>';

echo '</tr>';

// Armazena os dados da consulta em um array 
$queryid4="SELECT * FROM horasComplementares.User where RegistroAceito=0";
$busca4 = mysqli_query($conn, $queryid4);

while($dado4 = mysqli_fetch_array($busca4)){

echo '<tr>';

echo '<td>'.$dado4[0].'</td>';
echo '<td>'.$dado4[1].'</td>';
echo '<td>'.$dado4[2].'</td>';
echo '<td>'.$dado4[3].'</td>';
echo '<td>'.$dado4[4].'</td>';
echo '<td><a href="negaRegistro.php?var='.$dado4[0].'" target="_blank"><input type="button" size="5" name="$dado4[0]" value="Negar"></a><a href="aprovaRegistro.php?var='.$dado4[0].'" target="_blank"><input type="button" size="5" name="$dado4[0]" value="Aprovar"> </a></td>';

echo '</tr>';
}

echo '</table>';
mysqli_close($conn);
?>
            </fieldset>
        </div>
    <hr>
        
        