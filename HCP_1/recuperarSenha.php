<!DOCTYPE html>
<!--
*** INTERFACE PARA SOLICITAR RECUPERACAO DE SENHA ***
Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
-->
<html>
    <head>
        <title>Horas Complementares Computação</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body>
        <fieldset class="login" id="login">
            <legend>Digite sua Matrícula ou SIAPE</legend> 
                <form name="rs" action="dadosSenha.php" method="POST">
                    <input type="text" name="nMatricula" value="" />
                    <input type="submit" value="ENVIAR"/>
                </form>
        </fieldset>
    </body>
</html>
