<?php

    require_once'../Classes/PHPExcel/IOFactory.php';
    require_once'connection.php';

    $nameFile = 'Excel/TurmasAlunos.xlsx';

    $objPHPExcel = PHPEXCEL_IOFactory::load($nameFile);

    $objPHPExcel->setActiveSheetIndex(0);

    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    for ($i=2; $i <= $numRows; $i++) { 
        $nome_turma_pertence = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $numero_aluno_pertence = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $sql = "insert into pertence (nome_turma_pertence, cod_aluno_pertence) values ('$nome_turma_pertence',$numero_aluno_pertence);";
        // $sql = "insert into pertence (cod_turma_pertence, numero_aluno_pertence) values ('$cod_turma_pertence',$numero_aluno_pertence);";
        if (mysqli_query($mysqli, $sql)) {
            // $mysqli->query($sql);
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    }
    header("location:../../view/admin.php");