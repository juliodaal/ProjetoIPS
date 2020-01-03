<?php

require_once'connection.php';

$sql = "select * from pertence join aluno on numero_aluno_pertence=numero_aluno where cod_turma_pertence = '$nameTurma';";

    $result = mysqli_query($mysqli, $sql);
    $rows = mysqli_num_rows($result);

    $Array = [["$nameTurma"]];

    if ($rows>0) {

        while($rowCOD = $result->fetch_assoc()) {

            $name = $rowCOD['nome_aluno'];
            
            $numAluno = $rowCOD['numero_aluno'];
            
            $hora_entrada = $ObjHE['minHora'] ?? 0;
            
            $hora_saida =  $ObjHS['maxHora'] ?? 0;

            array_push($Array, [$name,$hora_entrada,$hora_saida,$numAluno]); 
        }
    }