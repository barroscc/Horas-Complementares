<?php

/* 
 * ***INTERFACE PARA REMOCAO DE ALUNO DA LISTA DE FORMANDOS POR JUBILAMENTO, TRANCAMENTO OU ABANDONO ***
 * TAMBÉM DÁ AS INSTRUCOES PARA RECUPERACAO DE QUALQUER ALUNO QUE SE TORNE NOVAMENTE ATIVO
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
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
                <legend>REMOVER FORMANDO</legend>  
                <form method="post" id="iBusca" name="nBusca" action="dadosRemoverFormando.php">
                    <input type="text" name="nMatricula" value=<?php echo $id?> hidden=""><br>Aluno: <?php echo $id?>
                        <br> <br>
                        Para remover aluno<br>
                        SELECIONE: 
                        <select name="nMotivo">
                            <option>Trancamento</option>
                            <option>Jubilado</option>
                            <option>Abandono</option>
                        </select><br>
                        <a href="dadosRemoverFormando.php" ><input type="Submit" value="SUBMETER" name="nSubMatricula" /></a>
                </form>
            </fieldset>
            <br><br><br><br><br><br><br><br><br>
            Obs.: Para recuperar alunos afastados por qualquer motivo<br>basta o cordenador buscar pela matrícula e marcar como formando,<br> em seguida ajustar nova data de provável formatura.
        </header>
    
        <figure class="headerUser1">
                <img src="_imagens/ComputacaoUfpel-menor.png">
            </figure >
            <figure class="headerUser2" >
                <img src="_imagens/UFPEL-menor.JPG">
            </figure>
           


