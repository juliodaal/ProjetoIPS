<?php

    require_once'../Classes/PHPExcel/IOFactory.php';
    require_once'connection.php';

    // $nameFile = $_POST['disciplinaFile'];
    // var_dump($nameFile);
    $nameFile = 'Excel/Aluno.xlsx';

    $objPHPExcel = PHPEXCEL_IOFactory::load($nameFile);

    $objPHPExcel->setActiveSheetIndex(0);

    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    for ($i=1; $i <= $numRows; $i++) { 
        $nome_aluno = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $numero_aluno = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $email_aluno = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $pwd_utilizador = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        $id = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $pwd_encrip = password_hash($pwd_utilizador, PASSWORD_DEFAULT);
        $sql = "insert into utilizador (id,pwd,nome,email,tipo_u) values ('$id','$pwd_encrip','$nome_aluno','$email_aluno',1);";
        // $sql = "insert into aluno (nome_aluno, cod_aluno, email_aluno, numero_aluno, tipo_utilizador) values ('$nome_aluno','$cod_aluno','$email_aluno',$numero_aluno ,1);";
        $sqlTwo = "insert into aluno (cod_aluno,id_aluno) values ('$numero_aluno','$id');";
        // $sqlTwo = "insert into utilizador (nome ,email_utilizador, pwd_utilizador, tipo_utilizador) values ('$nome_aluno','$email_aluno','$pwd_encrip',1);";
        if (mysqli_query($mysqli, $sql)) {
            $mysqli->query($sql);
            $mysqli->query($sqlTwo);
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    }
    header("location:../../view/admin.php");