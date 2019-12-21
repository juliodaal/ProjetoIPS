<?php

    require'../Classes/PHPExcel/IOFactory.php';
    require_once'connection.php';

    // $nameFile = $_POST['disciplinaFile'];
    // var_dump($nameFile);
    $nameFile = 'Excel/TurmasAlunos.xlsx';

    $objPHPExcel = PHPEXCEL_IOFactory::load($nameFile);

    $objPHPExcel->setActiveSheetIndex(0);

    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    for ($i=2; $i <= $numRows; $i++) { 
        $cod_turma_pertence = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $numero_aluno_pertence = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $sql = "insert into pertence (cod_turma_pertence, numero_aluno_pertence) values ('$cod_turma_pertence',$numero_aluno_pertence);";
        if (mysqli_query($mysqli, $sql)) {
            $mysqli->query($sql);
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    }