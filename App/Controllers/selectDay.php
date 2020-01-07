<?php

require_once'connection.php';

switch ($tipoUser) {
    case 1:
        $sqlDay = "select data_aula,numero_aluno from aluno join turmadisciplina on email_aluno= '$sessionUserId' join aula on id_turma=cod_aula join disciplina on cod_disciplina_turmaDisciplina=cod_disciplina where cod_turma='$nameTurma' and nome_disciplina= '$disciplinaTurma';";
        break;
    case 2:
        $sqlDay = "select data_aula,cod_professor from professor join turmadisciplina on email_professor= '$sessionUserId' join aula on id_turma=cod_aula join disciplina on cod_disciplina_turmaDisciplina=cod_disciplina where cod_turma='$nameTurma' and nome_disciplina= '$disciplinaTurma';";
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
                    $numProf =$rowCODDay['numero_aluno'];
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