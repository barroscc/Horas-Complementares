<?php
/* 
 * funcao que recupera senha do usuário
 * recebe id usuario de recuperarSenha.php
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

$id=$_POST["nMatricula"];
// busca dados de User no banco
include_once 'ClassUser.php';
$dado= dadosUser($id);
$var=$dado[0];
$var2=$dado[5];
?>
<html>
    <head>
        <title>Horas Complementares Computação</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body>
        <fieldset class="registro" id="login">
            <legend>Confirma Matrícula ou SIAPE?</legend> 
                <form name="rs" action="enviar.php" method="POST">
                    <input type="text" name="nMatricula" readonly="" placeholder="id Inválido" value="<?php echo $var?>" />
                    <input type="hidden" name="nMensagem" value="Sua senha para o Sistema de Registro de Horas Complementares é = <?php echo $var2?>" />
                    <input type="submit" value="CONFIRMAR"/>
                </form>
        </fieldset>
    </body>
