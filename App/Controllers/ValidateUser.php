<?php

require_once'connection.php';

$user = $_POST['email'];
$password = $_POST['password']; 

$sqlConsultEmail = "select email from utilizador where email = '$user'";
// $sqlConsultEmail = "select email_utilizador from utilizador where email_utilizador = '$user'";
$sqlConsultPwd = "select * from utilizador where email = '$user'";
// $sqlConsultPwd = "select * from utilizador where email_utilizador = '$user'";




if (mysqli_query($mysqli, $sqlConsultEmail)) {
    $result = mysqli_query($mysqli, $sqlConsultEmail);
    $rows = mysqli_num_rows($result);
    if ($rows>0) {
        $resultPwd = mysqli_query($mysqli, $sqlConsultPwd);
        $pass= mysqli_fetch_assoc($resultPwd);
        if (password_verify($password, $pass['pwd'])) {
                session_start();
                $_SESSION['nome'] = $pass['nome'];
                $_SESSION['email'] = $pass['email'];
                $_SESSION['pwd'] = $pass['pwd'];
                $_SESSION['tipo'] = $pass['tipo_u'];
                $tipo = $pass['tipo_u'];
                switch ($tipo) {
                    case 1:
                        header("location:../../view/cursos.php");
                        break;
                    case 2:
                        header("location:../../view/cursos.php");
                        break;
                    case 3:
                        header("location:../../view/admin.php");
                        break;
                    default:
                        header("location:../../view/cursos.php");
                        break;
                }
            // header("location:../../view/cursos.php");   
        } else {
            header("location:../../view/loginError.php");
        }
    } else {
        header("location:../../view/loginError.php");
    }
} else {
   echo "Error: " . $sqlConsultEmail . "" . mysqli_error($mysqli);
}
mysqli_free_result($result);
mysqli_close($mysqli);