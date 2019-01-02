<?php
/*
 * INTERFACE DO ADMINISTRADOR QUE PERMITE INDEFERIR, ALTERAR E APROVAR SUB ALUNO COM ALTERAÇÕES ALÉM DE PERMITIR ENVIAR MENSAGENS
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
$IdSub=$_GET["var"];
?>

<html>
    <head>
        <title>Registro Atividade Complementar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
        <?php $idAluno=$_POST["nIdAluno"];?>
    </head>
    
    <body>
        <div class="centro" id="centro">
            <form method="post" id="iRegistro" name="nRegistro" action="">
                <fieldset class="admin" id="admin">
                    <legend>Edite Atividade Complementar</legend> 
<?php 

include_once 'ClassUser.php';
$conn= conectar();

echo '<table>';

echo '<tr class="dif">';

echo '<td> Data </td>';
echo '<td> Atividade </td>';
echo '<td> Aluno </td>';
echo '<td> Horas Calculadas </td>';
echo '<td> Horas Soliciadas </td>';
echo '<td> Horas Aprovadas </td>';
echo '<td> AÇÕES </td>';

echo '</tr>';

// Armazena os dados da consulta em um array CB
$queryid4="SELECT * FROM horasComplementares.REGISTRO_ATIVIDADE where dataSubmis='$IdSub'";
$busca4 = mysqli_query($conn, $queryid4);
//transfere dados do banco para a tabela construída de forma dinâmmica. CB
while($dado4 = mysqli_fetch_array($busca4)){

echo '<tr>';

echo '<td>'.$dado4[0].'</td>';
echo '<td>'.$dado4[1].'</td>';
echo '<td>'.$dado4[2].'</td>';
echo '<td>'.$dado4[5].'</td>';
echo '<td>'.$dado4[7].'</td>';
echo '<td><input type="number" id="ih_aprovadas" size="5" name="h_aprovadas" value="0"></td>';
echo '<td> <a href="mensagem.php?var='.$dado4[2].'" target="_blank"><input type="button" size="5" name="$dado4[2]" value="Mensagem"></a>'
        . '<form method="post"> <input type="submit"  name="nAprovar" value="Aprovar"></form>'
        . '<a href="indeferirSubmissao.php?var='.$dado4[0].'" ><input type="button" size="5" name="$dado4[0]" value="Indeferir"></td>';

echo '</tr>';
$certificado="$dado4[10]";
}
echo '</table>';

?>
                    <br>
        Certificado <br>
                <iframe src="<?php echo $certificado?>" width="1000" height="780"  ></iframe>
                    <br> 
                </fieldset>
            </form>
        </div>
    </body>
    
<?php
//verifica se o valor de horas aprovadas  foi alterado e altera dados no banco
If($_POST['h_aprovadas']!=0){
    $horasAprov=$_POST['h_aprovadas'];
        echo $horasAprov;
    $queryid5="UPDATE `horasComplementares`.`REGISTRO_ATIVIDADE` SET `horasAprovadas`=$horasAprov WHERE `dataSubmis`='$IdSub'";
    mysqli_query($conn, $queryid5);
    $queryid6="UPDATE `horasComplementares`.`REGISTRO_ATIVIDADE` SET `estadoAtual`='Aprovado' WHERE `dataSubmis`='$IdSub'";
    mysqli_query($conn, $queryid6);
?>

<script> window.close(); </script>
</html>

<?php 
} 
mysqli_close($conn);



