<?php

require_once'connection.php';

switch ($tipoUser) {
    case 1:
        $sql = "select nome_aluno,numero_aluno from pertence join aluno on numero_aluno_pertence=numero_aluno where cod_turma_pertence = '$nameTurma' and email_aluno = '$sessionUserId';";
        break;
    case 2:
        $sql = "select nome_aluno,numero_aluno from pertence join aluno on numero_aluno_pertence=numero_aluno where cod_turma_pertence = '$nameTurma';";
        break;
    
    default:
        var_dump('Erro na pesquisa na base de dados');
        break;
}

    $result = mysqli_query($mysqli, $sql);
    $rows = mysqli_num_rows($result);

    $Array = [["$nameTurma"]];

    if ($rows>0) {

        while($rowCOD = $result->fetch_assoc()) {

            $name = $rowCOD['nome_aluno'];
            
            $numAluno = $rowCOD['numero_aluno'];
            
            $hora_entrada = 0;
            
            $hora_saida =  0;

            array_push($Array, [$name,$hora_entrada,$hora_saida,$numAluno]); 
        }
    }