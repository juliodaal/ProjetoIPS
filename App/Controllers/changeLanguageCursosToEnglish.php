<?php
require_once'connection.php';
$titles = $_GET['Array'];
$ArrayTraduc = [];
$titlesTraduc = [];
for ($j=0; $j < count($titles); $j++) {
    $sql = "select nome_pt,nome_en from mudarlanguage where nome_pt = '$titles[$j]';";
            $result = mysqli_query($mysqli, $sql);
            $rowCOD = $result->fetch_assoc();
            if ($titles[$j] == $rowCOD['nome_pt']) {
                array_push($titlesTraduc,$rowCOD['nome_en']);
            }
} 
// var_dump($titlesTraduc);
for ($i=0; $i < count($titlesTraduc); $i++) { 
    echo $titlesTraduc[$i]. ",";
}