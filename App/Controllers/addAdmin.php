<?php

    require_once'connection.php';
        $id = '459876123b';
        $nome_admin = 'JuanAdmi';
        $email_admin = 'juanAdmin@gmail.com';
        $pwd_utilizador = 'pwdamin';
        $pwd_encrip = password_hash($pwd_utilizador, PASSWORD_DEFAULT);
        $sql = "insert into utilizador (id,nome,email,pwd,tipo_u) values('$id','$nome_admin','$email_admin','$pwd_encrip',3);";
        // $sql = "insert into utilizador (nome ,email_utilizador, pwd_utilizador, tipo_utilizador) values ('$nome_admin','$email_admin','$pwd_encrip',3);";
        if (mysqli_query($mysqli, $sql)) {
            $mysqli->query($sql);
        } else {
           echo "Error: " . $sql . "" . mysqli_error($mysqli);
        }
        header("location:../../view/admin.php");