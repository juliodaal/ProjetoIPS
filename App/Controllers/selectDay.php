<?php

require_once'connection.php';

$sqlid="select id from utilizador where email ='$sessionUserId';";

        $resultSqlid = mysqli_query($mysqli, $sqlid);
        $resultSqlidCOD['id'] = $resultSqlid->fetch_assoc();
        $variavelID = $resultSqlidCOD['id'];~
        $id = $variavelID['id'];
switch ($tipoUser) {
    case 1:
        $sqlDay = "select distinct(data_aula),cod_aluno from aluno join turmadisciplina on cod_aluno= '$id' join aula on cod_turma=cod_aula join disciplina on cod_disciplina_td=cod_disciplina where nome_turma='$nameTurma' and nome_disciplina= '$disciplinaTurma';";
        // $sqlDay = "select data_aula,cod_aluno from disciplina join turmadisciplina on codigo_disciplina_td=codigo_disciplina join aula on nome_turma_aula=nome_turma join aluno on id_aluno='$variavelID' where nome_turma='$nameTurma' and nome_disciplina='$disciplinaTurma';";
        break;
    case 2:
        $sqlDay = "select distinct(data_aula),cod_professor from professor join turmadisciplina on cod_professor = cod_professor_td join disciplina on cod_disciplina_td=cod_disciplina join aula on cod_turma= cod_aula where cod_professor= '$id' and nome_turma='$nameTurma' and nome_disciplina='$disciplinaTurma';";
        // $sqlDay = "select data_aula,cod_professor from professor join turmadisciplina on email_professor= '$sessionUserId' join aula on id_turma=cod_aula join disciplina on cod_disciplina_turmaDisciplina=cod_disciplina where cod_turma='$nameTurma' and nome_disciplina= '$disciplinaTurma';";
        break;
    
    default:
        var_dump('Erro na pesquisa na base de dados');
        break;
}

    $resultDay = mysqli_query($mysqli, $sqlDay);
    $rowsDay = mysqli_num_rows($resultDay);
    $ArrayDay = [];

    if ($rowsDay>0) {

        while($rowCODDay = $resultDay->fetch_assoc()) {

            $dateDay= $rowCODDay['data_aula'];
            switch ($tipoUser) {
                case 1:
                    $numProf =$rowCODDay['cod_aluno'];
                    break;
                case 2:
                    $numProf =$rowCODDay['cod_professor'];
                    break;
                
                default:
                    var_dump('Erro no select Aluno');
                    break;
            }
            array_push($ArrayDay, $dateDay);
        }
    }