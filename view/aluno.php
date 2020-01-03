<?php
require_once '../App/Models/Aluno.php';
session_start();
$sessionUserId = $_SESSION['email'] ?? null;
$tipoUser = $_SESSION['tipo'] ?? null;
if (!$sessionUserId  || $tipoUser == 3) {
    echo 'No puedes entrar';
    die;
}
    $numeroAluno = $_GET['varA'];
    $nomeDisciplina = $_SESSION['nomeDisciplina'];
    $nomeTurma = $_SESSION['nomeTurma'];
    $dataDia = $_SESSION['data'];
    require_once '../App/Controllers/selectRegistroAluno.php';
    use App\Models\Aluno;
    $aluno = new Aluno();
    $aluno->setDataAluno($Array);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Aluno | SGA</title>
</head>
<body>
    <header>
        <nav>
            <div class="container-logotype-and-select">
                <div class="container-logotype">
                    <div class="logotype"><img src="../assets/image/Logótipo_do_Instituto_Politécnico_de_Setúbal.png" alt="logotype IPS"></div>
                    <h2>sga</h2>
                </div>
                <select name="language">
                    <option value="portuguese‎">Português - Portugal ‎(PT)</option>
                    <option value="english‎">English - United Kingdom ‎(UK)‎</option>
                </select>
            </div>
            <div class="user-style">
                <p><?php echo $_SESSION['nome']?></p>
                <div class="container-circle"><img src="../assets/image/default-user-icon-4.jpg" alt="User"></div>
                <div class="edit-profile"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path></svg></div>
            </div>
        </nav>
    </header>
    <section class="container-menu">
        <ul>
            <li><a href="cursos.php">d</a></li>
            <li><a href="turma.php">t</a></li>
            <!-- <li><a href="aluno.html">a</a></li> -->
            <li class="logout"><a href="../App/Controllers/logOut.php"><i class="fa">&#xf00d;</i></a></li>
        </ul>
    </section>
    <section class="container-principal">
           <div class="container-content-principal">
                <p style=" color: darkblue;" id="disciplina"><?php echo $nomeDisciplina;?>\<?php echo $nomeTurma;?></p>
                <h1><?php echo  $aluno->setNameAluno(); ?></h1>
                <div class="section-container">
                    <div class="container-aluno">
                        <?php $aluno->printAluno();?>
                    </div>
                </div>
           </div>
    </section>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>
</html>