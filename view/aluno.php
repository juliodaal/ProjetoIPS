<?php
$aluno = 
[
    ['João Pedro da Mata Cristão','190208014','08:30','12:30','4']
];
$average = 
[
    [100,'Dia'],
    [95,'Semana'],
    [75,'Mes'],
    [70,'Trimestre'],
    [65,'Semestre'],
    [60,'Ano']
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Aluno | SGA</title>
</head>
<body>
    <header>
        <nav>
            <div class="container-logotype-and-select">
                <div class="container-logotype">
                    <div class="logotype"><img src="../image/Logótipo_do_Instituto_Politécnico_de_Setúbal.png" alt="logotype IPS"></div>
                    <h2>sga</h2>
                </div>
                <select name="language">
                    <option value="portuguese‎">Português - Portugal ‎(PT)</option>
                    <option value="english‎">English - United Kingdom ‎(UK)‎</option>
                </select>
            </div>
            <div class="user-style">
                <p>Júlia Justino</p>
                <div class="container-circle"><img src="../image/default-user-icon-4.jpg" alt="User"></div>
                <div class="edit-profile"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path></svg></div>
            </div>
        </nav>
    </header>
    <section class="container-menu">
        <ul>
            <li><a href="cursos.php">c</a></li>
            <li><a href="turma.html">t</a></li>
            <!-- <li><a href="aluno.html">a</a></li> -->
            <li class="logout"><a href="login.php"><i class="fa">&#xf00d;</i></a></li>
        </ul>
    </section>
    <section class="container-principal">
           <div class="container-content-principal">
                <h1><?php echo $aluno[0][0] . ":" ?> 
                    <span>
                        <form action="/action_page.php">
                            <input type="date" name="bday" id="calendar" onchange="changeDate()">
                        </form>
                    </span>
                </h1>
                <div class="section-container">
                    <div class="container-aluno">
                        <?php echo "<div class='aluno'><h3>" . $aluno[0][0] . "</h3><h3>Número Estudante:" . $aluno[0][1] . "</h3><h3>Entrada:" . $aluno[0][2] . "</h3><h3>Saída:" . $aluno[0][3] . "</h3><h3>Total:" . $aluno[0][4] . "horas</h3></div>";?>
                    </div>
                </div>
           </div>
           <div class="container-average">
                <h1>Media de assistencias:</h1>
                <?php
                
                for ($k=0; $k < count($average); $k++) { 
                    for ($h=0; $h < 1; $h++) { 
                        echo "<div class='average'><h3>" . $average[$k][0] . "%</h3><span>" . $average[$k][1] . "</span></div>";
                    }
                }
                ?>
           </div>
    </section>
    <script>
    const calendar = document.getElementById('calendar');
    function changeDate() {
        var x = calendar.value;
        console.log(x);
    }
    
    </script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>
</html>