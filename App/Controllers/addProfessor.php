<?php

    require_once'../Classes/PHPExcel/IOFactory.php';
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
        $id = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $pwd_encrip = password_hash($pwd_utilizador, PASSWORD_DEFAULT);
        $sql = "insert into utilizador (id,pwd,nome,email,tipo_u) values ('$id','$pwd_encrip','$nome_professor','$email_professor',2);";
        // $sql = "insert into professor (nome_professor, email_professor, cod_professor, tipo_utilizador) values ('$nome_professor','$email_professor',$cod_professor,2);";
        $sqlTwo = "insert into professor (cod_professor,id_professor) values ('$cod_professor','$id');";
        // $sqlTwo = "insert into utilizador (nome, email_utilizador, pwd_utilizador, tipo_utilizador) values ('$nome_professor','$email_professor','$pwd_encrip',2);";
        if (mysqli_query($mysqli, $sql)) {
            $mysqli->query($sql);
            $mysqli->query($sqlTwo);
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    }
    header("location:../../view/admin.php");