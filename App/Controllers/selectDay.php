<?php

require_once'connection.php';

$sqlDay = "select data_aula,cod_professor from professor join turmadisciplina on email_professor= '$sessionUserId' join aula on id_turma=cod_aula join disciplina on cod_disciplina_turmaDisciplina=cod_disciplina where cod_turma='$nameTurma' and nome_disciplina= '$disciplinaTurma';";

    $resultDay = mysqli_query($mysqli, $sqlDay);
    $rowsDay = mysqli_num_rows($resultDay);

    $ArrayDay = [];

    if ($rowsDay>0) {

        while($rowCODDay = $resultDay->fetch_assoc()) {

            $dateDay= $rowCODDay['data_aula'];
            $numProf =$rowCODDay['cod_professor'];
            array_push($ArrayDay, $dateDay);
        }
    }