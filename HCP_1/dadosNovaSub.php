<?php

/* 
 * *** FUNCAO RECEBE DADOS POR POST DE FORMULÁRIO novaSubAtiv.php ****
 **** ADICIONA NOVA SUBMISSAO DE ATIVIDADE POR ALUNO NO DB ****
 * Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
        include_once 'ClassUser.php';
        $conn= conectar();
        
        $idRequerente = $_POST['nIdAluno'];
        $dataSub = date('Y-m-d G:i:s'); // Salva o timestamp atual numa variável
        $atividade = $_POST["nomeAtiv"];
        $inicio = $_POST["nInicio"];
        $fim = $_POST["nFim"];
        $horasDeclaradas=$_POST["nHorasDeclaradas"];
        $inst=$_POST["nInst"];       
        $URL="/_$idRequerente";
        mkdir(_alunos,0777,true);
        mkdir(_alunos.$URL, 0777, TRUE);
        $diretorio="_alunos/_$idRequerente/";
        $uploadfile = $diretorio.basename($_FILES['nArquivo']['name']);
        
        echo '<pre>';
if (move_uploaded_file($_FILES['nArquivo']['tmp_name'],$uploadfile)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível erro de upload de arquivo!\n";
}
        print "</pre>";
//seleciona qual administrador está ativo na época da submissão
//pode gerar problemas se um novo administrador for adicionado e nao houver inativação do administrador antigo
$queryAdmin="SELECT * FROM horasComplementares.ADMINISTRADOR where situacaoAtual = 1";
$buscaAdmin = mysqli_query($conn, $queryAdmin);
$detalhesAdminDb = mysqli_fetch_array($buscaAdmin);

        $administrador=$detalhesAdminDb[1];
        
//seleciona dados sobre o tipo de atividade do banco
$queryAtiv="SELECT * FROM horasComplementares.ATIVIDADE where nomeAtividade = '$atividade'";
$buscaAtiv = mysqli_query($conn, $queryAtiv);
$detalhesAtivDb = mysqli_fetch_array($buscaAtiv);

        $tipo=$detalhesAtivDb[1];
        $requerente=$idRequerente;
        $estadoAtual="Em Análise";
        $valorUnidade=$detalhesAtivDb[3];
        $alerta=1;
        
//calcula a quantidade de unidades de acordo com o tipo de unidade registrada  tabela ATIVIDADE do DB  
        if ($detalhesAtivDb[2]=="Unidade") {
            $quantidadeUnidade=1;
            $alerta=0;
}
        if ($detalhesAtivDb[2]=="horas") {
            $quantidadeUnidade=$horasDeclaradas;
            $alerta=1;
}
        if ($detalhesAtivDb[2]=="Semestre") {
            $datetime1 = date_create($inicio);
            $datetime2 = date_create($fim);
            $interval = date_diff($datetime1, $datetime2);
            $resultado=$interval->m + $interval->y * 12;
            $quantidadeUnidade=(int)($resultado/4);
            $alerta=1;
}
 //calcula as horas de acordo com a quantidade de unidades e o valor de cada unidade       
        $horasCalculadas=$valorUnidade*$quantidadeUnidade;
//insere nova atividade no banco com valor de estado atual de "EM ANÁLISE"        
        $sql = "INSERT INTO horasComplementares.REGISTRO_ATIVIDADE (dataSubmis,atividade,requerente,estadoAtual,administrador,horasCalculadas, alerta,horasDeclaradas,horasAprovadas,tipo,certificado,instituicao) "
        . "VALUES ('$dataSub', '$atividade', '$requerente','$estadoAtual','$administrador',$horasCalculadas,$alerta,$horasDeclaradas,0,'$tipo','$uploadfile','$inst')";
        if (mysqli_query($conn, $sql)) {
     echo "Dados registrados com sucesso ";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn); 

