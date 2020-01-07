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
                <p>Nome Administrador</p>
                <!-- <div class="container-circle"><img src="../assets/image/default-user-icon-4.jpg" alt="User"></div> -->
                <!-- <div class="edit-profile"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path></svg></div> -->
            </div>
        </nav>
    </header>
    <section class="container-menu">
        <ul>
            <!-- <li><a href="cursos.php">c</a></li> -->
            <!-- <li><a href="#">t</a></li> -->
            <!-- <li><a href="#">a</a></li> -->
            <li class="logout"><a href="../App/Controllers/logOut.php"><i class="fa">&#xf00d;</i></a></li>
        </ul>
    </section>
    <section class="container-principal">
        <div class="container-form-admin">
                <!-- <div class="formAdmin" id="inserirNumeroDisTurma">
                        <h1>Inserir Aluno</h1>
                        <form action="">
                            <label for="NomeAluno">Nome Aluno (Completo)</label>
                            <input type="text" name="NomeAluno" placeholder="Nome Aluno">
                            <label for="">Número Estudante</label>
                            <input type="text" name="NumeroEstudante" placeholder="Número Estudante">
                            <label for="">Email Aluno</label>
                            <input type="email" name="EmailAluno" placeholder="Email Aluno">
                            <label for="">Password do Aluno</label>
                            <input type="password" name="PasswordAluno" placeholder="Password do Aluno">
                            <label for="">ID do Aluno</label>
                            <input type="text" name="idAluno" placeholder="ID do aluno (Representanção do dado Biometrico)"> -->
                            <!-- <label for="">Tipo Utilizador</label> -->
                            <!-- <select name="TipoUtilizador" id="TipoUtilizadorAluno" aria-placeholder="Tipo Utilizador">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select> -->
                            <!-- <h2>Disciplinas e turmas</h2>
                            <label for="">Número de disciplinas</label>
                            <div class="containerNumeroDisciplinas" id="containerNumeroDisciplinasAluno">
                            </div>
                            <input type="number" name="numeroDisciplinas" id="numeroDisciplinasAluno" min="0" placeholder="1 ou 2 ...n">
                            <input type="button" value="OK!" id="buttonDisciplinasAluno">
                            <label for="">Ano a cursar</label>
                            <input type="number" name="anoAcursarAluno" id="anoAcursarAluno">
                        </form> -->
                        <form action="../App/Controllers/addDisciplinas.php" method="post">
                            <h1>Inserir Disciplinas</h1>
                            <!-- <input type="file" name="disciplinaFile" id="disciplinaFile" multiple> -->
                            <input type="submit" value="Submeter dados disciplina">
                        </form>
                        <form action="../App/Controllers/addAluno.php" method="post">
                            <h1>Inserir dados Aluno</h1>
                            <!-- <input type="file" name="disciplinaFile" id="disciplinaFile" multiple> -->
                            <input type="submit" value="Submeter dados Aluno">
                        </form>
                        <form action="../App/Controllers/addProfessor.php" method="post">
                            <h1>Inserir dados Professor</h1>
                            <!-- <input type="file" name="disciplinaFile" id="disciplinaFile" multiple> -->
                            <input type="submit" value="Submeter dados Professor">
                        </form>
                        <form action="../App/Controllers/addHorarios.php" method="post">
                            <h1>Inserir dados Horarios</h1>
                            <!-- <input type="file" name="disciplinaFile" id="disciplinaFile" multiple> -->
                            <input type="submit" value="Submeter dados Professor">
                        </form>
                        <form action="../App/Controllers/addTurmaAlunos.php" method="post">
                            <h1>Inserir dados TurmasAlunos</h1>
                            <!-- <input type="file" name="disciplinaFile" id="disciplinaFile" multiple> -->
                            <input type="submit" value="Submeter dados Professor">
                        </form>
                        <form action="../App/Controllers/addAdmin.php" method="post">
                            <h1>Inserir dados Admin</h1>
                            <!-- <input type="file" name="disciplinaFile" id="disciplinaFile" multiple> -->
                            <input type="submit" value="Submeter dados admin">
                        </form>
                    <!-- </div> -->
                <div class="formAdmin" id="inserirNumeroDisTurma">
                        <h1>Inserir Professor</h1>
                        <form action="">
                            <label for="NomeProfessor">Nome Professor (Completo)</label>
                            <input type="text" name="NomeAluno" placeholder="Nome Professor">
                            <label for="">Número Professor</label>
                            <input type="text" name="NumeroProfessor" placeholder="Número Professor">
                            <label for="">Email Professor</label>
                            <input type="email" name="EmailProfessor" placeholder="Email Professor">
                            <label for="">Password do Professor</label>
                            <input type="password" name="PasswordProfessor" placeholder="Password do Professor">
                        </form>
                </div>
                <div>
                    <h2>Disciplinas e turmas  (À Ensinar)</h2>
                    <form action="">
                            <label for="">Número de disciplinas</label>
                            <div class="containerNumeroDisciplinas" id="containerNumeroDisciplinasProfessor">
                            </div>
                            <input type="number" name="numeroDisciplinas" id="numeroDisciplinasProfessor" min="0" placeholder="1 ou 2 ...n">
                            <input type="button" value="OK!" id="buttonDisciplinasProfessor">
                            <label for="">Ano a cursar</label>
                            <input type="number" name="anoAcursarAluno" id="anoAcursarProfessor">
                    </form>
                </div>

        </div>
                
    </section>
    <script>
            const containerNumeroDisciplinasAluno = document.getElementById('containerNumeroDisciplinasAluno');
            const containerNumeroDisciplinasProfessor = document.getElementById('containerNumeroDisciplinasProfessor');
            const buttonDisciplinasAluno = document.getElementById('buttonDisciplinasAluno');
            const buttonDisciplinasProfessor = document.getElementById('buttonDisciplinasProfessor');
            const cancelDisciplinas = document.getElementById('cancelDisciplinas');
            const containerAll = document.getElementById('containerAll');
            const numeroDisciplinasAluno = document.getElementById('numeroDisciplinasAluno');
            const numeroDisciplinasProfessor = document.getElementById('numeroDisciplinasProfessor');
            let text = `
                    <label for=''>Disciplina </label>
                    <input type="text" name="CodigoDisciplina" placeholder="Codigo de disciplina">
                    <label for=''>Turma</label>
                    <input type="text" name="CodigoTurma" placeholder="Codigo de Turma">`;
                let cancel = false;
                let result = '';
                buttonDisciplinasAluno.addEventListener('click', () => {
                    inserirNumeroDisTurma(this.numeroDisciplinasAluno,this.buttonDisciplinasAluno, this.containerNumeroDisciplinasAluno);
                });
                buttonDisciplinasProfessor.addEventListener('click', () => {
                    inserirNumeroDisTurma(this.numeroDisciplinasProfessor,this.buttonDisciplinasProfessor, this.containerNumeroDisciplinasProfessor);
                });
            function inserirNumeroDisTurma(numeroDisciplina,buttonDisciplinas,containerNumeroDisciplinas) {
                let n = numeroDisciplina.value;
                if (cancel) {
                    numeroDisciplina.style.display = 'inline-block';
                    containerNumeroDisciplinas.innerHTML = '';
                    buttonDisciplinas.value = 'OK!';
                    cancel = false;
                 } else {
                    for (let i = 0; i < n; i++) {
                        result = result + text;
                    }
                    numeroDisciplina.style.display = 'none';
                    containerNumeroDisciplinas.innerHTML = result;
                    result = '';
                    buttonDisciplinas.value = 'Cancel';
                    cancel = true;
                 }
            }
        </script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <!-- <script src="../js/main.js"></script> -->
</body>
</html>