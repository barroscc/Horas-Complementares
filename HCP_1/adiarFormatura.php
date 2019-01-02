<?php
/* 
 * *** FUNCAO QUE RECEBE PARAMETRO POR GET DE UM BOTAO DE TABELA ***
 * *** ESTA FUNCAO ALTERA DATA DE FORMATURA DO ALUNO PARA NO DB PARA VALOR DIGITADO EM FORMULÁRIO ***
 *  Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
$id=$_GET["var"];
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
            <fieldset class="remover" id="admin">
                
                <legend>ADIAR PROVÁVEL FORMANTURA</legend>  
                <form method="post" id="iBusca" name="nBusca" action="dadosAdiarFormatura.php">
                    <input type="text" name="nMatricula" value=<?php echo $id?> hidden=""><br>Aluno: <?php echo $id?>
                        <br> <br>
                        Para adiar formatura: <br>
                        Ano: <input type="number" name="nAno" min="2019" max="2040" value="2019"> Sem: <input type="number" name="nSem" min="1" max="2" value="1">
                        <br> <br> 
                        <a href="dadosAdiarFormatura.php" ><input type="Submit" value="SUBMETER" name="nSubMatricula" /></a>
                </form>
        </header>
        <figure class="headerUser1">
                <img src="_imagens/ComputacaoUfpel-menor.png">
        </figure >
        <figure class="headerUser2" >
                <img src="_imagens/UFPEL-menor.JPG">
        </figure>
           

