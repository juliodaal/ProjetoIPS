<?php

require_once'connection.php';
// require_once'connectionArduino.php';
date_default_timezone_set("UTC");

// $arduinoEntrada = $ardEntrada;
$valArduinoEntrada = true;
$saveHour = date('H:i:s');
$saveDate = date('Y-m-d');

switch ($valArduinoEntrada) {
    case true:
        $arduinoDate_aisstem = $saveDate;
        $arduinoHora_entrada = $saveHour;
        $arduinoHora_saida = 0;
        $arduinoEntrada = 1;
        $arduinoNumero_aluno_assistem = 190208029;
        $arduinoCod_aula_assistem = 'S478';
        break;
    case false:
        $arduinoDate_aisstem = $saveDate;
        $arduinoHora_entrada = 0;
        $arduinoHora_saida = $saveHour;
        $arduinoEntrada = 0;
        $arduinoNumero_aluno_assistem = 190208029;
        $arduinoCod_aula_assistem = 'S478';
        break;
    default:
        echo 'Error volte a prencher';
        break;
}

$sql = "insert into assistem (date_assitem, hora_entrada, hora_saida, entrada, numero_aluno_assistem, cod_aula_assistem) values ('$arduinoDate_aisstem', '$arduinoHora_entrada','$arduinoHora_saida',$arduinoEntrada,$arduinoNumero_aluno_assistem,'$arduinoCod_aula_assistem');";

if (mysqli_query($mysqli, $sql)) {
    // $mysqli->query($sql);
} else {
   echo "Error: " . $sql . "" . mysqli_error($mysqli);
}
// header("location:../../view/button.php");