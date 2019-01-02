<!DOCTYPE html>
<!--
*** INTERFACE INICIAL DO SISTEMA ***
Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
-->
<html>
    <head>
        <title>Horas Complementares Computação - UFPel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body>
        <header id="hLogin">
            <figure class="header">
                <img src="_imagens/indexHeader-menor-melhor.png">
            </figure> 
        </header>
        
        <div class="nao">
            <form method="post" id="fLogin" action="login.php">
                <fieldset class="login" id="login">
                    <legend>Login</legend> 
                    <p>Matrícula/SIAPE<br><input type="text" name="nID" id="iID" size="30" maxlength="10" ></p>
                    <p>Senha<br><input type="password" name="nSenha" id="iSenha" size="8" maxlength="8" placeholder=""></p>
                    <p><input type="submit"  value="ENTRAR"></p>
                <p><a href="recuperarSenha.php"><input type="button" value="Recuperar a Senha"></a> </p>
               </fieldset>
                <span class="index"> <a href="Registro.html"><input class="teste" type="button" name="nRegistro" id="bRegistro" value="PRIMEIRO ACESSO"></a></span>
            </form>
        </div>
    </body>
</html>




