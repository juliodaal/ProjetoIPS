<?php

require_once'connection.php';

$sql = "select nome,cod_aluno,entrada,hora_entrada,hora_saida from disciplina join turmadisciplina on cod_disciplina=cod_disciplina_td join aula on nome_turma=nome_turma_aula join assistem on data_aula=data_assistem join aluno on cod_aluno=cod_aluno_assistem join utilizador on id_aluno=id where nome_disciplina= '$nomeDisciplina' and nome_turma= '$nomeTurma' and data_assistem = '$dataDia' and cod_aluno = '$numeroAluno' group by hora_entrada, hora_saida;";
// $sql = "select nome_aluno,numero_aluno,entrada,hora_entrada,hora_saida from disciplina join turmadisciplina on cod_disciplina=cod_disciplina_turmaDisciplina join  aluno join assistem on numero_aluno=numero_aluno_assistem where nome_disciplina= '$nomeDisciplina' and cod_turma= '$nomeTurma' and date_assitem = '$dataDia' and numero_aluno = '$numeroAluno' group by hora_entrada, hora_saida;";

    $result = mysqli_query($mysqli, $sql);
    $rows = mysqli_num_rows($result);

    $Array = [];

    if ($rows>0) {

        while($rowCOD = $result->fetch_assoc()) {

            $name = $rowCOD['nome'];
            
            $numAluno = $rowCOD['cod_aluno'];
            
            $entrada = $rowCOD['entrada'];

            $hora_entrada = $rowCOD['hora_entrada'];
            
            $hora_saida =  $rowCOD['hora_saida'];

            array_push($Array, [$name,$numAluno,$entrada,$hora_entrada,$hora_saida]); 
        }
    }
     if ($Array == []) {
        $Array = [['Não há Informação','Não há Informação',1,'Não há Informação']];
     }