<?php

$host = '127.0.0.1:3306';
    $root = 'root';
    $password = 'Julio2587946';
    $bd = 'SGA';

    $mysqli = new mysqli($host, $root, $password, $bd);

        if($mysqli->connect_error){
            die('Error at the connection' . $mysqli->connect_error);
        }
        printf("Servidor Informacion: %s\n", $mysqli->server_info);
    