<?php
require_once'connection.php';
$titles = $_GET['Array'];

$ArrayTraduc = [];
$titlesTraduc = [];


for ($j=0; $j < count($titles); $j++) {
$sql = "select nome_pt,nome_en from mudarlinguagem where nome_en = '$titles[$j]';";
// $sql = "select nome_pt,nome_en from mudarlanguage where nome_en = '$titles[$j]';";
            $result = mysqli_query($mysqli, $sql);
            $rowCOD = $result->fetch_assoc();
            if ($titles[$j] == $rowCOD['nome_en']) {
                array_push($titlesTraduc,$rowCOD['nome_pt']);
            }
}

for ($i=0; $i < count($titlesTraduc); $i++) { 
    echo $titlesTraduc[$i]. ",";
}