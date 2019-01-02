<?php
/* 
 * Este arquivo faz o registro de um novo usuario
 * *** RECEBE DADOS POST DE registro.html ****
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

include_once 'ClassUser.php';
$conn= conectar();

$id=$_POST["nMatr"];
$nivel=$_POST["nNivel"];
$nome=$_POST["nNome"];
$email=$_POST["nEmail"];
$tel=$_POST["nTel"];
$curso=$_POST["nCurso"];
$curr=$_POST["nCurr"];
$formatura=($_POST["nAno"]."/".$_POST["nSem"]);
$senha1=$_POST["nSenha1"];
//insere dados na tabela USER do DB
$sql = "INSERT INTO horasComplementares.USER (id,nivel,nome,email,tel,senha, registroAceito) "
        . "VALUES ('$id', $nivel, '$nome','$email','$tel','$senha1',0)";
//verifica o tipo de usuário e insere dados nas tabela específicas
if (mysqli_query($conn, $sql)) {
     // echo "Dados registrados com sucesso ";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
if($nivel==0){
   $sql = "INSERT INTO horasComplementares.ALUNO (matricula,provavelFormatura,curso,curriculo,URL_Dir,URL_RelatorioFinal) 
       VALUES ('$id','$formatura','$curso','$curr','urlaluno','urldocumentofinal')";
    if (mysqli_query($conn, $sql)) {
        echo nl2br("Dados do ALUNO registrados com sucesso \n O colegiado enviará um e-mail quando validar seu cadastro ");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}

if($nivel==1){
   $sql = "INSERT INTO horasComplementares.COORDENADOR (idCoordenador,curso) 
       VALUES ('$id','$curso')";
    if (mysqli_query($conn, $sql)) {
      echo nl2br("Dados do COORDENADOR registrados com sucesso \n O colegiado enviará um e-mail quando validar seu cadastro ");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
}

if($nivel==2){
   $sql = "INSERT INTO horasComplementares.administrador (curso, idAdministrador) 
       VALUES ('$curso','$id')";
   if (mysqli_query($conn, $sql)) {
      echo nl2br("Dados do ADMINISTRADOR registrados com sucesso \n O colegiado enviará um e-mail quando validar seu cadastro ");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
//insere botão para retornar a pagina de login
?>
<br><br>
<a href="index.php"> <input class="teste" type="button" name="nRetornar" id="iRetornar" value="RETORNAR"></a>
