<?php

require_once'connection.php';
// require_once'connectionArduino.php';
date_default_timezone_set("UTC");

$dadoBioArduino = '190208014b';
$dadoEntradaBooleano = false;

$sqlRequest = "select cod_aluno from aluno where id_aluno = '$dadoBioArduino';";
// $sqlRequest = "select numero_aluno from aluno where cod_aluno = '$dadoBioArduino';";
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
        $arduinoNumero_aluno_assistem = $COD['cod_aluno'];
        break;
    case false:
        $arduinoDate_aisstem = $saveDate;
        $arduinoHora_entrada = 0;
        $arduinoHora_saida = $saveHour;
        $arduinoEntrada = 0;
        $arduinoNumero_aluno_assistem = $COD['cod_aluno'];
        break;
    default:
        echo 'Error volte a prencher';
        break;
}

$sqlRequestTwo = "select max(cod_aula_assistem) from assistem";
$resulttwos = mysqli_query($mysqli, $sqlRequestTwo);
$CODtwo = $resulttwos->fetch_assoc();
var_dump($CODtwo['max(cod_aula_assistem)']);
if ($CODtwo['max(cod_aula_assistem)'] == NULL) {
    $numeroDeImpressões =  0;
} else {
    $numeroDeImpressões = $CODtwo['max(cod_aula_assistem)'];
}
$numeroDeImpressões++;
$sql = "insert into assistem (cod_aluno_assistem,cod_aula_assistem,entrada,data_assistem,hora_entrada,hora_saida) values ($arduinoNumero_aluno_assistem,$numeroDeImpressões,$arduinoEntrada,'$arduinoDate_aisstem','$arduinoHora_entrada','$arduinoHora_saida');";
// $sql = "insert into assistem (date_assitem, hora_entrada, hora_saida, entrada, numero_aluno_assistem, cod_aula_assistem) values ('$arduinoDate_aisstem', '$arduinoHora_entrada','$arduinoHora_saida',$arduinoEntrada,$arduinoNumero_aluno_assistem,'$arduinoCod_aula_assistem');";
if (mysqli_query($mysqli, $sql)) {
    header("location:../../view/button.php");
} else {
   echo "Error: " . $sql . "" . mysqli_error($mysqli);
}
// header("location:../../view/button.php");