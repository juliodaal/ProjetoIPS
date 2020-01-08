<?php
session_start();
$sessionUserId = $_SESSION['email'] ?? null;
$tipoUser = $_SESSION['tipo'] ?? null;
if (!$sessionUserId  || $tipoUser != 3) {
    header("location:login.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Admin | SGA</title>
    <style>
    .container-form-admin .formFlex{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .buttonSubmit{
        padding: 5px 20px;
        background: royalblue;
        color: white;
        border: 2px solid royalblue;
        border-radius: 5px;
        transition: .3s;
        cursor: pointer;
    }
    .buttonSubmit:hover{
        background:transparent;
        color:royalblue;
        transform: scale(1.05);
    }
    .container-form-admin .formadminFlex form input{
        margin: 4px 0px 10px 0px;
        padding: 5px 10px;
        border: 1px solid royalblue;
    }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="container-logotype-and-select">
                <div class="container-logotype">
                    <div class="logotype"><img src="../assets/image/Logótipo_do_Instituto_Politécnico_de_Setúbal.png" alt="logotype IPS"></div>
                    <h2>sga</h2>
                </div>
                <select name="language" id="select-language" onchange="changeLanguage()">
                    <option value="portuguese‎">Português - Portugal ‎(PT)</option>
                    <option value="english‎">English - United Kingdom ‎(UK)‎</option>
                </select>
            </div>
            <div class="user-style">
                <p><?php echo $_SESSION['nome'];?></p>
                <!-- <div class="container-circle"><img src="../assets/image/default-user-icon-4.jpg" alt="User"></div> -->
                <!-- <div class="edit-profile"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path></svg></div> -->
            </div>
        </nav>
    </header>
    <section class="container-menu">
        <ul>
            <!-- <li><a href="cursos.php">c</a></li> -->
            <li><a href="#" style="display: none;">t</a></li>
            <li><a href="#" style="display: none;">a</a></li>
            <li class="logout"><a href="../App/Controllers/logOut.php"><i class="fa">&#xf00d;</i></a></li>
        </ul>
    </section>
    <section class="container-principal">
        <div class="container-form-admin">
                        <form class="formFlex" action="../App/Controllers/addDisciplinas.php" method="post">
                            <h1 class="InserirDisciplinas">Inserir Disciplinas</h1>
                            <input class="buttonSubmit" type="submit" value="Submeter dados disciplina">
                        </form>
                        <form class="formFlex" action="../App/Controllers/addAluno.php" method="post">
                            <h1 class="InserirdadosAluno">Inserir dados Aluno</h1>
                            <input class="buttonSubmit" type="submit" value="Submeter dados Aluno">
                        </form>
                        <form class="formFlex" action="../App/Controllers/addProfessor.php" method="post">
                            <h1 class="InserirdadosProfessor">Inserir dados Professor</h1>
                            <input class="buttonSubmit" type="submit" value="Submeter dados Professor">
                        </form>
                        <form class="formFlex" action="../App/Controllers/addHorarios.php" method="post">
                            <h1 class="InserirdadosHorarios">Inserir dados Horarios</h1>
                            <input class="buttonSubmit" type="submit" value="Submeter dados Professor">
                        </form>
                        <form class="formFlex" action="../App/Controllers/addTurmaAlunos.php" method="post">
                            <h1 class="InserirdadosTurmasAlunos">Inserir dados TurmasAlunos</h1>
                            <input class="buttonSubmit" type="submit" value="Submeter dados Professor">
                        </form>
                        <form class="formFlex" action="../App/Controllers/addAdmin.php" method="post">
                            <h1 class="InserirdadosAdmin">Inserir dados Admin</h1>
                            <input class="buttonSubmit" type="submit" value="Submeter dados admin">
                        </form>
        </div>
                
    </section>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <!-- <script src="../js/main.js"></script> -->
</body>
</html>