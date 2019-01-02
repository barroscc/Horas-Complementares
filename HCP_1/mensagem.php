<!DOCTYPE html>
<!--
*** INTERFACE PARA ENVIOR DE MENSAGENS para alunos ***
pode receber parametro por POST ou GET
Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
-->
<html>
    <head>
        <title>Horas Complementares Aluno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
     <?php
          $matricula=isset($_POST["matricula"])? $_POST["matricula"]:$_GET["var"] ;
        ?>
    <body>
        <fieldset  class="admin" id="admin">
            <legend>Emviar Mensagem</legend>
                <form method="post" action="enviar.php">
                    <input type="text" name="nMatricula" value="<?php echo $matricula;?>" hidden="">
                    <textarea name="nMensagem" rows="10" cols="100">
                    </textarea> 
                    <input type="submit" value="Enviar Mensagem">        
                </form>
        </fieldset>
    </body>
</html>




