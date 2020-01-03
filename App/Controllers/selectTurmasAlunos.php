<?php

require_once'connection.php';

$sql = "select cod_turma_pertence from utilizador join aluno on email_utilizador = email_aluno join pertence on numero_aluno = numero_aluno_pertence where email_utilizador = '$sessionUserId';";
    
    $result = mysqli_query($mysqli, $sql);
    $rows = mysqli_num_rows($result);

    $Array = [];

    if ($rows>0) {

        while($rowCOD = $result->fetch_assoc()) {

            $x = $rowCOD['cod_turma_pertence'];
            $sqlTwo = "select nome_disciplina from turmadisciplina join disciplina on cod_disciplina_turmaDisciplina=cod_disciplina where cod_turma = '$x' group by cod_disciplina_turmaDisciplina;";
            
            $resultDIS = mysqli_query($mysqli, $sqlTwo);
            $Numrows = mysqli_num_rows($resultDIS);

            if ($Numrows>0) {
                
                while($Rrow = $resultDIS->fetch_assoc()){
                    
                    $aux = $Rrow['nome_disciplina'];
                    array_push($Array, [$aux,$x]);

                }
            }
        }
    }