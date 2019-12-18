<?php

    require'../Classes/PHPExcel/IOFactory.php';
    require_once'connection.php';

    // $nameFile = $_POST['disciplinaFile'];
    // var_dump($nameFile);
    $nameFile = 'Excel/Aluno.xlsx';

    $objPHPExcel = PHPEXCEL_IOFactory::load($nameFile);

    $objPHPExcel->setActiveSheetIndex(0);

    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    for ($i=1; $i < $numRows; $i++) { 
        $nome_aluno = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $numero_aluno = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $email_aluno = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $pwd_utilizador = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        $cod_aluno = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $sql = "insert into aluno (nome_aluno, cod_aluno, email_aluno, numero_aluno, tipo_utilizador) values ('$nome_aluno','$cod_aluno','$email_aluno',$numero_aluno ,1);";
        $sqlTwo = "insert into utilizador (email_utilizador, pwd_utilizador, tipo_utilizador) values ('$email_aluno','$pwd_utilizador',1);";
        if (mysqli_query($mysqli, $sql)) {
            $mysqli->query($sql);
            $mysqli->query($sqlTwo);
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    }