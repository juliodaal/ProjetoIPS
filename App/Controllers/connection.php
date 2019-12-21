<?php

    $host = '127.0.0.1:3306';
    $root = 'root';
    $password = '';
    $bd = 'SGA';

    $mysqli = new mysqli($host, $root, $password, $bd);
    mysqli_query($mysqli,"SET CHARACTER SET 'utf8'");
        if($mysqli->connect_error){
            die('Error at the connection' . $mysqli->connect_error);
        }
        printf("Information Server: %s\n", $mysqli->server_info);
    