<?php

require_once'connection.php';
// require_once'connectionArduino.php';
date_default_timezone_set("UTC");

// $arduinoEntrada = $ardEntrada;
$valArduinoEntrada = false;
$saveHour = date('H:i:s');

switch ($valArduinoEntrada) {
    case true:
        $arduinoHora_entrada = $saveHour;
        $arduinoHora_saida = 0;
        $arduinoEntrada = 1;
        $arduinoNumero_aluno_assistem = 190208014;
        $arduinoCod_aula_assistem = 'F369';
        break;
    case false:
        $arduinoHora_entrada = 0;
        $arduinoHora_saida = $saveHour;
        $arduinoEntrada = 0;
        $arduinoNumero_aluno_assistem = 190208014;
        $arduinoCod_aula_assistem = 'F369';
        break;
    default:
        echo 'Error volte a prencher';
        break;
}

$sql = "insert into assistem (hora_entrada, hora_saida, entrada, numero_aluno_assistem, cod_aula_assistem) values ('$arduinoHora_entrada','$arduinoHora_saida',$arduinoEntrada,$arduinoNumero_aluno_assistem,'$arduinoCod_aula_assistem');";

if (mysqli_query($mysqli, $sql)) {
    // $mysqli->query($sql);
} else {
   echo "Error: " . $sql . "" . mysqli_error($mysqli);
}