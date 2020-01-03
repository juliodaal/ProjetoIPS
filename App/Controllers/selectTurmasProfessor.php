<?php

require_once'connection.php';

$sql = "select cod_turma from professor join turmadisciplina on cod_professor=cod_professor_turmaDisciplina where email_professor = '$sessionUserId' group by cod_turma;";
    
    $result = mysqli_query($mysqli, $sql);
    $rows = mysqli_num_rows($result);

    $Array = [];
    $i = 0;
    $u = 0;
    $secuence = [];
    $nomeTurma = true;
    $valueSecuence = '';
    
    if ($rows>0) {

        while($rowCOD = $result->fetch_assoc()) {
            $boo = false;      
            $x = $rowCOD['cod_turma'];
            $sqlTwo = "select nome_disciplina from professor join turmadisciplina on cod_professor=cod_professor_turmaDisciplina join disciplina on cod_disciplina_turmaDisciplina= cod_disciplina where email_professor = '$sessionUserId' and cod_turma = '$x' group by cod_disciplina_turmaDisciplina;";
            
            $resultDIS = mysqli_query($mysqli, $sqlTwo);
            $Numrows = mysqli_num_rows($resultDIS);

            if ($Numrows>0) {
                
                while($Rrow = $resultDIS->fetch_assoc()){
                    if ($nomeTurma) {
                        array_push($secuence, $Rrow['nome_disciplina']);
                    }
                    for ($h=0; $h < count($secuence); $h++) { 
                        if ($secuence[$h] == $Rrow['nome_disciplina']) {
                            $boo = true;
                        } else {
                            $boo = false;    
                        }
                    }
                    if ($boo == false) {
                        array_push($secuence, $Rrow['nome_disciplina']);
                    }

                    for ($j=0; $j < count($secuence); $j++) { 
                       if ($secuence[$j] == $Rrow['nome_disciplina']) {
                           $valueSecuence = $Rrow['nome_disciplina'];
                       break;                       
                        }
                    }

                    if ($i > 0 && $valueSecuence == $Rrow['nome_disciplina']) {
                        array_push($Array[$i - 1],$x);
                        $i++;
                    } else {
                        array_push($Array, [$valueSecuence,$x]);
                    }
                }
                $nomeTurma = false;
                $u++;
                $i = $u;
            }
        }
    }