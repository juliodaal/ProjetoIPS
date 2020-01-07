<?php

require_once'connection.php';
// require_once'connectionArduino.php';
date_default_timezone_set("UTC");

$dadoBioArduino = '190208014b';
$dadoEntradaBooleano = true;
$dadoSalaId = 'S478';


$sqlRequest = "select numero_aluno from aluno where cod_aluno = '$dadoBioArduino';";
$result = mysqli_query($mysqli, $sqlRequest);
// $rows = mysqli_num_rows($result);
$COD = $result->fetch_assoc();
$valArduinoEntrada = $dadoEntradaBooleano;
$saveHour = date('H:i:s');
$saveDate = date('Y-m-d');
switch ($valArduinoEntrada) {
    case true:
        $arduinoDate_aisstem = $saveDate;
        $arduinoHora_entrada = $saveHour;
        $arduinoHora_saida = 0;
        $arduinoEntrada = 1;
        $arduinoNumero_aluno_assistem = $COD['numero_aluno'];
        $arduinoCod_aula_assistem = $dadoSalaId;
        break;
    case false:
        $arduinoDate_aisstem = $saveDate;
        $arduinoHora_entrada = 0;
        $arduinoHora_saida = $saveHour;
        $arduinoEntrada = 0;
        $arduinoNumero_aluno_assistem = $COD['numero_aluno'];;
        $arduinoCod_aula_assistem = $dadoSalaId;
        break;
    default:
        echo 'Error volte a prencher';
        break;
}

$sql = "insert into assistem (date_assitem, hora_entrada, hora_saida, entrada, numero_aluno_assistem, cod_aula_assistem) values ('$arduinoDate_aisstem', '$arduinoHora_entrada','$arduinoHora_saida',$arduinoEntrada,$arduinoNumero_aluno_assistem,'$arduinoCod_aula_assistem');";

if (mysqli_query($mysqli, $sql)) {
    header("location:../../view/button.php");
} else {
   echo "Error: " . $sql . "" . mysqli_error($mysqli);
}