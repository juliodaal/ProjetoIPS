<?php 
session_start();
require_once'connection.php';

$dateTurmaAula = $_GET['varb'];
$tipoUser = $_SESSION['tipo'];
$sessionUserId = $_SESSION['email'];
$nameTurmaDay = '';
$dateTurmaDay = '';
$count = 0;
$topHoraFim = 0;
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
switch ($tipoUser) {
    case 1:
        $sql = "select nome_aluno,numero_aluno from pertence join aluno on numero_aluno_pertence=numero_aluno where cod_turma_pertence = '$nameTurmaDay' and email_aluno = '$sessionUserId';";
        break;
    case 2:
        $sql = "select nome_aluno,numero_aluno from pertence join aluno on numero_aluno_pertence=numero_aluno where cod_turma_pertence = '$nameTurmaDay';";
        break;
    
    default:
        var_dump('Erro na pesquisa na base de dados');
        break;
}

    $result = mysqli_query($mysqli, $sql);
    $rows = mysqli_num_rows($result);

    $Array = [];

    if ($rows>0) {

        while($rowCOD = $result->fetch_assoc()) {

            $name = $rowCOD['nome_aluno'];
            
            $numAluno = $rowCOD['numero_aluno'];
            
            $sqlentrada = "select numero_aluno_pertence,fim_aula,entrada,min(hora_entrada) as 'minHora' from pertence join aluno on numero_aluno_pertence=numero_aluno join assistem on numero_aluno=numero_aluno_assistem join aula on cod_aula_assistem=sala and date_assitem=data_aula where cod_turma_pertence = '$nameTurmaDay' and numero_aluno_assistem = '$numAluno' and entrada = 1 and date_assitem = '$dateTurmaDay' and hora_entrada>=comenco_aula and hora_entrada<=fim_aula;";
            $EnvSqlentrada = mysqli_query($mysqli, $sqlentrada);
            $ObjHE = $EnvSqlentrada->fetch_assoc();
            $hora_entrada = $ObjHE['minHora'] ?? 0;
            
            $sqlsaida = "select numero_aluno_pertence,entrada,max(hora_saida) as 'maxHora' from pertence join aluno on numero_aluno_pertence=numero_aluno join assistem on numero_aluno=numero_aluno_assistem join aula on cod_aula_assistem=sala and date_assitem=data_aula where cod_turma_pertence = '$nameTurmaDay' and numero_aluno_assistem = '$numAluno' and entrada = 0 and date_assitem = '$dateTurmaDay' and hora_saida>=comenco_aula;";
            $EnvSqlsaida = mysqli_query($mysqli, $sqlsaida);
            $ObjHS = $EnvSqlsaida->fetch_assoc();
            $hora_saida =  $ObjHS['maxHora'] ?? 0;
            if ($ObjHE['fim_aula'] != NULL) {
                $topHoraFim = $ObjHE['fim_aula'];
            }
            array_push($Array, [$name,$hora_entrada,$hora_saida, $numAluno]); 
        }
    }
    switch ($tipoUser) {
        case 1:
            for ($i=0; $i < count($Array) ; $i++) {
                if ($topHoraFim < $Array[$i][2] || $Array[$i][2] == 0) {
                    echo "<div class='container-estudantes'>";
                    for ($j=0; $j < 1; $j++) { 
                        echo "<a href='aluno.php?varA=" . $Array[$i][3] . "' style='background: #fdfc47;'><div class='estudantes'><h3>" . $Array[$i][0] . "</h3><h3 class='entrada'>Entrada: " . $Array[$i][1] . "</h3><h3 class='saida'>Saída: " . $Array[$i][2] . "</h3></div></a>";
                    }
                    echo "</div>";
                } else {
                    echo "<div class='container-estudantes'>";
                    for ($j=0; $j < 1; $j++) { 
                        echo "<a href='aluno.php?varA=" . $Array[$i][3] . "'><div class='estudantes'><h3>" . $Array[$i][0] . "</h3><h3 class='entrada'>Entrada: " . $Array[$i][1] . "</h3><h3 class='saida'>Saída: " . $Array[$i][2] . "</h3></div></a>";
                    }
                    echo "</div>";
                }
            }
            break;
        case 2:
            for ($i=0; $i < count($Array) ; $i++) { 
                if ($topHoraFim < $Array[$i][2] || $Array[$i][2] == 0) {
                    echo "<div class='container-estudantes'>";
                    for ($j=0; $j < 1; $j++) { 
                        echo "<a href='aluno.php?varA=" . $Array[$i][3] . "' style='background: #fdfc47;'><div class='estudantes'><h3>" . $Array[$i][0] . "</h3><h3 class='entrada'>Entrada: " . $Array[$i][1] . "</h3><h3 class='saida'>Saída: " . $Array[$i][2] . "</h3></div></a>";
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
                } else {
                    echo "<div class='container-estudantes'>";
                    for ($j=0; $j < 1; $j++) { 
                        echo "<a href='aluno.php?varA=" . $Array[$i][3] . "'><div class='estudantes'><h3>" . $Array[$i][0] . "</h3><h3 class='entrada'>Entrada: " . $Array[$i][1] . "</h3><h3 class='saida'>Saída: " . $Array[$i][2] . "</h3></div></a>";
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
            }
            break;
        
        default:
            var_dump('Erro no print elements');
            break;
    }