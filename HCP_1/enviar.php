<?php

/* 
 * funcao envia email .  recebe post ou get de formularios diversos
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */

//Variáveis

$matricula = isset($_POST['nMatricula'])? $_POST['nMatricula']:$_GET['var'];
$mensagem = isset($_POST['nMensagem'])? $_POST['nMensagem']:$_GET['var2'];

include_once 'ClassUser.php';
$conn= conectar();

$queryid4="SELECT * FROM horasComplementares.USER where id=$matricula";
$busca4 = mysqli_query($conn, $queryid4);
$dado4 = mysqli_fetch_array($busca4);
    $to = $dado4[3];
    $nome = $dado4[2];
    $segredo = $dado4[5];
// Compo E-mail
    $arquivo = " Prezado $nome <br><br>
 
Abaixo você está recebendo uma mensagem do Sistema de Horas Complementares. Caso necessário responda enviando uma mensagem ao colegiado do curso. Por favor, não responda para este endereço. <br><br>

$mensagem <br><br> Atenciosamente <br><br> Colegiado Computação

  ";

    $assunto = "UFPel/CDTec - Horas Complementares ";
 
  // É necessário indicar que o formato do e-mail é html
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UFPel/CDTec <http://localhost:8888/HCP_1/login.php>';
  //$headers .= "Bcc: barrosccpel@gmail.comlPadrao\r\n";

    $enviaremail = mail($to, $assunto, $arquivo, $headers);
  if($enviaremail){
  echo "E-MAIL ENVIADO COM SUCESSO! <br> Sua solicitação será enviada para o e-mail relacionado a matrícula = $matricula. <br> Verifique sua caixa de span."; 
  //echo " <meta http-equiv='refresh' content='10;URL=enviar.php'>";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "Erro ao enviar a mensagem";
  }
 

