<?php

/*
 Nesta Versão Não HÁ NENHUMA INSTANCIAÇÃO CLÁSSICA DAS CLASSES. ESTE DOCUMENTO ACABA SENDO APENAS UM DOCUMENTO COM FUNÇÕES
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
 
function conectar(){
        $servername = "localhost:3306";
        $database = "horascomplementares";
        $username = "root";
        $password = "123mudar";
// Create connection
       $conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}  //echo "Connected successfully   ";

return $conn;
}

function dadosUser($id){
    $conn=conectar();
    $queryid="SELECT * FROM horasComplementares.USER where id=$id";
    $busca = mysqli_query($conn, $queryid);
    $dado = mysqli_fetch_array($busca);
    mysqli_close($conn);
    return $dado;
}
/*
 function aprovarSub($id1,$horas1) {
        echo 'ENTROU';
        /*
        $conn=conectar();
        $queryid4="UPDATE `horasComplementares`.`REGISTRO_ATIVIDADE` SET `horasAprovadas`='.$horas1.' WHERE `dataSubmis`='$id1'";
        mysqli_query($conn, $queryid4);
        $queryid5="UPDATE `horasComplementares`.`REGISTRO_ATIVIDADE` SET `estadoAtual`='Aprovado' WHERE `dataSubmis`='$id1'";
        mysqli_query($conn, $queryid5);
        
    }

abstract class  User {
    var $id, $nivel,$nome,$email,$tel,$senha,$registroAceito;
    function __construct($id, $nivel, $nome, $email, $tel, $senha, $registroAceito) {
        $this->id = $id;
        $this->nivel = $nivel;
        $this->nome = $nome;
        $this->email = $email;
        $this->tel = $tel;
        $this->senha = $senha;
        $this->registroAceito = $registroAceito;
    }

    
    function getId() {
        return $this->id;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getTel() {
        return $this->tel;
    }

    function getSenha() {
        return $this->senha;
    }

    function getRegistroAceito() {
        return $this->registroAceito;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setRegistroAceito($registroAceito) {
        $this->registroAceito = $registroAceito;
    }


}

//aluno aluno aluno aluno aluno aluno aluno aluno aluno aluno aluno aluno

 class Aluno{
    var $matricula,$provavelFormatura,$curso,$curriculo,$URL_Dir,$URL_RelatorioFinal;
    
    function __construct($id, $nivel, $nome, $email, $tel, $senha, $registroAceito, $provavelFormatura, $curso, $curriculo, $URL_Dir, $URL_RelatorioFinal) {
        $this->id = $id;
        $this->nivel = $nivel;
        $this->nome = $nome;
        $this->email = $email;
        $this->tel = $tel;
        $this->senha = $senha;
        $this->registroAceito = $registroAceito;
        
        $this->provavelFormatura = $provavelFormatura;
        $this->curso = $curso;
        $this->curriculo = $curriculo;
        $this->URL_Dir = $URL_Dir;
        $this->URL_RelatorioFinal = $URL_RelatorioFinal;
    }

        
    public function solicitarRegistro($nomeAtiv){
        $servername = "localhost:3306";
        $database = "horascomplementares";
        $username = "root";
        $password = "123mudar";

// Create connection
       $conn = mysqli_connect($servername, $username, $password, $database);
        $queryAtiv="SELECT * FROM horasComplementares.ATIVIDADE where nomeAtividade = 'Monitorias'";
$buscaAtiv = mysqli_query($conn, $queryAtiv);
$dadoMenuAtiv = mysqli_fetch_array($buscaAtiv);
return $dadoMenuAtiv;
    }
    
    function visualizarExtrato(){
        
    }
    
    function editarRegistro(){
        
    }
    public function getMatricula() {
        return $this->id;
    }

    function getProvavelFormatura() {
        return $this->provavelFormatura;
    }

    function getCurso() {
        return $this->curso;
    }

    function getCurriculo() {
        return $this->curriculo;
    }

    function getURL_Dir() {
        return $this->URL_Dir;
    }

    function getURL_RelatorioFinal() {
        return $this->URL_RelatorioFinal;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setProvavelFormatura($provavelFormatura) {
        $this->provavelFormatura = $provavelFormatura;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setCurriculo($curriculo) {
        $this->curriculo = $curriculo;
    }

    function setURL_Dir($URL_Dir) {
        $this->URL_Dir = $URL_Dir;
    }

    function setURL_RelatorioFinal($URL_RelatorioFinal) {
        $this->URL_RelatorioFinal = $URL_RelatorioFinal;
    }


}    
    // COORDENADOR COORDENADOR COORDENADOR COORDENADOR COORDENADOR COORDENADOR 

class Coordenador extends User{
    var $curso;
    
    function __construct($curso) {
        $this->curso = $curso;
    }

        
    function editarCurriculo(){
        
    }
    
    function addCurriculo(){
        
    }
    
    function aprovaRelFinal(){
        
    }
    
    function buscaAluno(){
        
    }
    function getCurso() {
        return $this->curso;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }


}

// ADMINISTRADOR ADMINISTRADOR ADMINISTRADOR ADMINISTRADOR ADMINISTRADOR 

class Administrador extends User{
    
    function __construct() {
        
    }

    
    function editaRegAtividade(){
        
    }
    
    function validaRgAtividade(){
        
    }
    
    
    function invalidaRgAtividade(){
        
    }
    
    function enviaMensagem(){
        
    }
    
    function validaInscricaoSite(){
        
    }
    

}

class RegistroAtividade {
    var $dataSub,$atividade,$requerente,$estadoAtual,$administrador,$horasCalculadas,$alerta,$horasDeclaradas,$horasAprovadas,$tipo,$certificado;
    function __construct($dataSub, $atividade, $requerente, $estadoAtual, $administrador, $horasCalculadas, $alerta, $horasDeclaradas, $horasAprovadas,$tipo,$certificado) {
        
        $this->dataSub = $dataSub;
        $this->atividade = $atividade;
        $this->requerente = $requerente;
        $this->estadoAtual = $estadoAtual;
        $this->administrador = $administrador;
        $this->horasCalculadas = $horasCalculadas;
        $this->alerta = $alerta;
        $this->horasDeclaradas = $horasDeclaradas;
        $this->horasAprovadas = $horasAprovadas;
        $this->tipo = $tipo;
        $this->certificado = $certificado;
    }

    
    public function submeterAtividade(RegistroAtividade $RA){
        
    }
    
    public function aprovarSub($id1,$horas1) {
        echo 'ENTROU';
        $conn=conectar();
        $queryid4="UPDATE `horasComplementares`.`REGISTRO_ATIVIDADE` SET `horasAprovadas`='.$horas1.' WHERE `dataSubmis`='$id1'";
        mysqli_query($conn, $queryid4);
        $queryid5="UPDATE `horasComplementares`.`REGISTRO_ATIVIDADE` SET `estadoAtual`='Aprovado' WHERE `dataSubmis`='$id1'";
        mysqli_query($conn, $queryid5);
        
    }
    
    
    function getCertificado() {
        return $this->certificado;
    }

    function setCertificado($certificado) {
        $this->certificado = $certificado;
    }

    
    
    function getDataSub() {
        return $this->dataSub;
    }

    function getEstadoAtual() {
        return $this->estadoAtual;
    }

    function getTipoAtiv() {
        return $this->tipoAtiv;
    }

    function getRequerente() {
        return $this->requerente;
    }

    function getAdministrador() {
        return $this->administrador;
    }

    function getValorHoras() {
        return $this->valorHoras;
    }

    function setDataSub($dataSub) {
        $this->dataSub = $dataSub;
    }

    function setEstadoAtual($estadoAtual) {
        $this->estadoAtual = $estadoAtual;
    }

    function setTipoAtiv($tipoAtiv) {
        $this->tipoAtiv = $tipoAtiv;
    }

    function setRequerente($requerente) {
        $this->requerente = $requerente;
    }

    function setAdministrador($administrador) {
        $this->administrador = $administrador;
    }

    function setValorHoras($valorHoras) {
        $this->valorHoras = $valorHoras;
    }



}

class PastaAluno{
    var $donoPasta,$URL_Dir,$vetorDocs;
    
    function visualizarPasta(){
        
    }
}
//mysqli_close($conn);
?>
