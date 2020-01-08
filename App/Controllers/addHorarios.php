<?php

    require_once'../Classes/PHPExcel/IOFactory.php';
    require_once'connection.php';

    // $nameFile = $_POST['disciplinaFile'];
    // var_dump($nameFile);
    $nameFile = 'Excel/Horarios.xlsx';

    $objPHPExcel = PHPEXCEL_IOFactory::load($nameFile);

    $objPHPExcel->setActiveSheetIndex(0);

    $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    for ($i=2; $i <= $numRows; $i++) { 
        $nome_turma = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $cod_disciplina_turmaDisciplina = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $cod_professor_turmaDisciplina = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $data_aula = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        $comenco_aula = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $fim_aula = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
        $sala = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
        $ano = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
        $cod_turma = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
        $sql = "insert into turmaDisciplina (nome_turma, cod_disciplina_td, cod_professor_td, ano_turma) values ('$nome_turma','$cod_disciplina_turmaDisciplina', $cod_professor_turmaDisciplina,'$ano');";
        // $sql = "insert into turmaDisciplina (cod_turma, cod_disciplina_turmaDisciplina, cod_professor_turmaDisciplina, ano) values ('$cod_turma','$cod_disciplina_turmaDisciplina',$cod_professor_turmaDisciplina,$ano);";
        $sqlTwo = "insert into aula (data_aula, comeco_aula, fim_aula, sala,nome_turma_aula,cod_turma_aula) values ('$data_aula','$comenco_aula','$fim_aula','$sala','$nome_turma',$cod_turma);";
        // $sqlTwo = "insert into aula (data_aula, comenco_aula, fim_aula, sala) values ('$data_aula','$comenco_aula','$fim_aula','$sala');";
        if (mysqli_query($mysqli, $sql)) {
            // $mysqli->query($sql);
            $mysqli->query($sqlTwo);
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
    }
    header("location:../../view/admin.php");