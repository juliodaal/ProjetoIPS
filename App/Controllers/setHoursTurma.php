<?php 
session_start();
require_once'connection.php';

$dateTurmaAula = $_GET['varb'];

$nameTurmaDay = '';
$dateTurmaDay = '';
$count = 0;
for ($k=0; $k < strlen($dateTurmaAula); $k++) { 
    if ($dateTurmaAula[$k] == ",") {
    break;
    } else {
        $nameTurmaDay = $nameTurmaDay . $dateTurmaAula[$k];
        $count++;
    }
}
for ($p= $count + 1; $p < strlen($dateTurmaAula); $p++) { 
    $dateTurmaDay = $dateTurmaDay . $dateTurmaAula[$p];
}
$_SESSION['data'] = $dateTurmaDay;
$sql = "select * from pertence join aluno on numero_aluno_pertence=numero_aluno where cod_turma_pertence = '$nameTurmaDay';";

    $result = mysqli_query($mysqli, $sql);
    $rows = mysqli_num_rows($result);

    $Array = [];

    if ($rows>0) {

        while($rowCOD = $result->fetch_assoc()) {

            $name = $rowCOD['nome_aluno'];
            
            $numAluno = $rowCOD['numero_aluno'];
            
            $sqlentrada = "select numero_aluno_pertence,entrada,min(hora_entrada) as 'minHora' from pertence join aluno on numero_aluno_pertence=numero_aluno join assistem on numero_aluno=numero_aluno_assistem join aula on cod_aula_assistem=sala and date_assitem=data_aula where cod_turma_pertence = '$nameTurmaDay' and numero_aluno_assistem = '$numAluno' and entrada = 1 and date_assitem = '$dateTurmaDay' and hora_entrada>=comenco_aula and hora_entrada<=fim_aula;";
            $EnvSqlentrada = mysqli_query($mysqli, $sqlentrada);
            $ObjHE = $EnvSqlentrada->fetch_assoc();
            $hora_entrada = $ObjHE['minHora'] ?? 0;
            
            $sqlsaida = "select numero_aluno_pertence,entrada,max(hora_saida) as 'maxHora' from pertence join aluno on numero_aluno_pertence=numero_aluno join assistem on numero_aluno=numero_aluno_assistem join aula on cod_aula_assistem=sala and date_assitem=data_aula where cod_turma_pertence = '$nameTurmaDay' and numero_aluno_assistem = '$numAluno' and entrada = 0 and date_assitem = '$dateTurmaDay' and hora_saida>=comenco_aula and hora_saida<=fim_aula;";
            $EnvSqlsaida = mysqli_query($mysqli, $sqlsaida);
            $ObjHS = $EnvSqlsaida->fetch_assoc();
            $hora_saida =  $ObjHS['maxHora'] ?? 0;

            array_push($Array, [$name,$hora_entrada,$hora_saida, $numAluno]); 
        }
    }
    for ($i=0; $i < count($Array) ; $i++) { 
        echo "<div class='container-estudantes'>";
            for ($j=0; $j < 1; $j++) { 
                echo "<a href='aluno.php?varA=" . $Array[$i][3] . "'><div class='estudantes'><h3>" . $Array[$i][0] . "</h3><h3>Entrada: " . $Array[$i][1] . "</h3><h3>Saída: " . $Array[$i][2] . "</h3></div></a>";
            }
        echo "<label class='container-checkbox-estudantes'>";
        if ($Array[$i][1] != 0) {
            echo "<input type='checkbox' class='checkboxClass' checked>";
        } else {
            echo "<input type='checkbox' class='checkboxClass'>";
        }
        echo "<span class='checkmark'></span>";
        echo "</label>";
        echo "</div>";
    }