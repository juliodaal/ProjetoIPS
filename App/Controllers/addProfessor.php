<?php

    require'../Classes/PHPExcel/IOFactory.php';
    require_once'connection.php';

    // $nameFile = $_POST['disciplinaFile'];
    // var_dump($nameFile);
    $nameFile = 'Excel/Professor.xlsx';

    $objPHPExcel = PHPEXCEL_IOFactory::load($nameFile);

    $objPHPExcel->setActiveSheetIndex(0);

    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    for ($i=1; $i <= $numRows; $i++) { 
        $nome_professor = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $email_professor = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $cod_professor = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $pwd_utilizador = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        $sql = "insert into professor (nome_professor, email_professor, cod_professor, tipo_utilizador) values ('$nome_professor','$email_professor',$cod_professor,2);";
        $sqlTwo = "insert into utilizador (email_utilizador, pwd_utilizador, tipo_utilizador) values ('$email_professor','$pwd_utilizador',2);";
        if (mysqli_query($mysqli, $sql)) {
            $mysqli->query($sql);
            $mysqli->query($sqlTwo);
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    }