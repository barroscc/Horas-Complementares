<?php

/* 
 * *** INERFACE DO ALUNO PARA SUBMETER NOVOS REGISTROS DE ATIVIDADES COM CERTIFICADOS ***
 *  Carlos Barros, Ana Marilza Pernas, Lisane Brisolara
 */
?>
<html>
    <head>
        <title>Registro Atividade Complementar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
        <?php $idAluno=$_POST["nIdAluno"];?>
    </head>
    
    <body>
     
        <div class="centro" id="centro">
            <form enctype="multipart/form-data" method="post" id="iRegistro" name="nRegistro" action="dadosNovaSub.php">
            <!--<input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
                <fieldset class="remover" id="registro">
                    <legend>Nova Submissão de Atividade Complementar</legend> 
 <!-- A LINHA ABAIXO É NECESSÁRIA PARA PASSAR O ID DO ALUNO COMO PARAMETRO PARA A CLASSE dadosNovaSub.php  -->
                        <input type="text" name="nIdAluno" value=<?php echo $idAluno?> hidden="">
                    Nome Atividade<br>
                        <select name="nomeAtiv" onselect="dadosMenuAtividade.php" required="">
    <option value="Bolsista / Voluntário em Proj de Ensino">Bolsista / Voluntário em Proj de Ensino (((Ensino -  Semestre = 51horas, max 153horas))) </option>
    <option value="Bolsista / Voluntário em Proj de Extensão">Bolsista / Voluntário em Proj de Extensão (((Extensão -  Semestre = 51horas, max 153horas)))</option>
    <option value="Bolsista / Voluntário em Proj de Pesquisa">Bolsista / Voluntário em Proj de Pesquisa (((Pesquisa -  Semestre = 51horas, max 153horas)))</option>
    <option value="Certificações Profissionais">Certificações Profissionais (((Ensino -  Horas - max 1 = 51horas, max 102horas)))</option>
    <option value="Monitorias">Monitorias (((Ensino -  Semestre = 51horas, max 102horas)))</option>
    <option value="Obtenção de Prêmios e Distinções">Obtenção de Prêmios e Distinções (((Pesquisa -  Unidade = 68horas, max 136horas)))</option>
    <option value="Participação em Ativ. Extensão (inclui org. de eventos)">Participação em Ativ. Extensão (inclui org. de eventos) (((Extensão -  Horas - min 1 = 34horas, max 153horas)))</option>
    <option value="Participação em Cursos e Escolas">Participação em Cursos e Escolas (((Ensino -  Horas - max 1 = 51horas, max 102horas)))</option>
    <option value="Participação em Eventos Científicos Internacionais">Participação em Eventos Científicos Internacionais (((Pesquisa -  Unidade = 34horas, max 68horas)))</option>
    <option value="Participação em Eventos Científicos Nacionais">Participação em Eventos Científicos Nacionais (((Pesquisa -  Unidade = 34horas, max 68horas)))</option>
    <option value="Participação em Eventos Científicos Regionais e Locais">Participação em Eventos Científicos Regionais e Locais (((Pesquisa -  Unidade = 17horas, max 51horas)))</option>
    <option value="Participação na Semana Acadêmica do curso">Participação na Semana Acadêmica do curso (((Ensino -  Horas - max 1 = 34horas, max 68horas)))</option>
    <option value="Publicação em Eventos Científicos Internacionais">Publicação em Eventos Científicos Internacionais (((Pesquisa -  Unidade = 68horas, max 136horas)))</option>
    <option value="Publicação em Eventos Científicos Nacionais">Publicação em Eventos Científicos Nacionais (((Pesquisa -  Unidade = 51horas, max 102horas)))</option>
    <option value="Publicação em Eventos Científicos Regionais e Locais">Publicação em Eventos Científicos Regionais e Locais (((Pesquisa -  Unidade = 34horas, max 68horas)))</option>
    <option value="Representação Estudantil">Representação Estudantil (((Ensino -  Semestre = 51horas, max 102horas)))</option>
    <option value="Registro de Software">Registro de Software (((Pesquisa -  Unidade = 68horas, max 153horas)))</option>
                        </select> 
                        <br>
            Inicio: <input type="date"  size="15" name="nInicio"> 
            Fim: <input type="date" size="15" name="nFim"><br>
            Horas Solicitadas: <input type="number"  name="nHorasDeclaradas" max="200" required="">
                        <br> 
            Certificado <br>
                    <input type="file"  name="nArquivo" accept=".pdf" required="">
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                    <br>Instituição:
                    <input type="text" size="80" maxlength="80" name="nInst" required="" placeholder="Digite a sigla ou nome da instituição do Evento/Curso">
                        <br> 
                    <input type="submit" value="SUBMETER">
                </fieldset>
            </form>
        </div>
    </body>
</html>


