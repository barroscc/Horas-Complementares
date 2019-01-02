<?php
/* 
 * *** valida login e direciona user para interface de acordo com seu nível de privilégio ***
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
include_once 'ClassUser.php';
$conn= conectar();

$id1 = $_POST['nID'];
$senha1 = $_POST['nSenha'];

$queryid1="SELECT * FROM horasComplementares.USER where id=$id1";
$busca1 = mysqli_query($conn, $queryid1);
$dado = mysqli_fetch_array($busca1);

$id2 = $dado[0];
$nivel = $dado[1];
$senha2 = $dado[5];
$registroAceito = $dado[6];

//verificando login id e senha.
if ($id1!=$id2||$id1=="") {
echo 'Usuário NÃO Cadastrado'; 
}elseif ($senha1!=$senha2) {
    echo 'Senha Incorreta';
} elseif($registroAceito==0){
    echo 'Registro aguardando aceite do colegiado';
}else{    
//selecionando direcionamento de acordo com o nível do User. CB
    if ($nivel==0) {
        $queryid2="SELECT * FROM horasComplementares.Aluno where matricula=$id1";
        $busca2 = mysqli_query($conn, $queryid2);
        $dado2 = mysqli_fetch_array($busca2);
        require_once ("Aluno.php"); 
    }
    if ($nivel==1) {
        require_once("Coordenador.php");        
    }
    if ($nivel==2) {
        require_once("Administrador.php");        
    }
} 
mysqli_close($conn);





