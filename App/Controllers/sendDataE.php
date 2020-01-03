<?php

require_once'connection.php';

$titleTurma = $_GET['titleTurma'];
$numeroEstudantes = $_GET['numeroEstudantes'];
$media = $_GET['media'];
$materia = $_GET['materia'];
$numProfessor = $_GET['numProfessor'];~
$day = $_GET['day'] ?? 0;
$intNumProfessor =  (int)$numProfessor;
$intNumeroEstudantes = (int)$numeroEstudantes;

$sqlInserE = "insert into dataE (nome_turma, cantidade_estudantes, media_estudantes, nome_disciplina, numero_professor, day_turma) values ('$titleTurma', $intNumeroEstudantes,'$media','$materia' ,$intNumProfessor,'$day');";


if (mysqli_query($mysqli, $sqlInserE)) {
    echo 'A informação foi enviada com succeso!!';
} else {
   echo "Error: " . $sql . "" . mysqli_error($mysqli);
}