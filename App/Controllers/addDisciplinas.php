<?php

    require_once'../Classes/PHPExcel/IOFactory.php';
    require_once'connection.php';

    // $nameFile = $_POST['disciplinaFile'];
    // var_dump($nameFile);
    $nameFile = 'Excel/disciplina.xlsx';

    $objPHPExcel = PHPEXCEL_IOFactory::load($nameFile);

    $objPHPExcel->setActiveSheetIndex(0);

    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    for ($i=1; $i <= $numRows; $i++) { 
        $cod_disciplina = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $nome_disciplina = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $sql = "insert into disciplina (cod_disciplina, nome_disciplina) values ('$cod_disciplina','$nome_disciplina')";
        if (mysqli_query($mysqli, $sql)) {
            $mysqli->query($sql);
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    }
    header("location:../../view/admin.php");