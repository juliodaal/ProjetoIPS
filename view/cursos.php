<?php

$disciplinas = 
[
    ['Matemática','Turma 1 M','Turma 2 M','Turma 3 M','Turma 4 M'],
    ['Logica','Turma 1 L','Turma 2 L','Turma 3 L','Turma 4 L'],
    ['Base de dados','Turma 1 B','Turma 2 B','Turma 3 B','Turma 4 B'],
    ['Progrmação para Internet','Turma 1 P','Turma 2 P','Turma 3 P','Turma 4 P']
];
$professor = 
[
    ['Júlia Justino','juliajustino@gmail.com']
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
    <title>Curso | SGA</title>
</head>
<body>
    <header>
        <nav>
            <div class="container-logotype-and-select">
                <div class="container-logotype">
                    <div class="logotype"><img src="../image/Logótipo_do_Instituto_Politécnico_de_Setúbal.png" alt="logotype IPS"></div>
                    <h2>sga</h2>
                </div>
                <select name="language" id="select-language" onchange="changeLanguage()">
                    <option value="portuguese‎">Português - Portugal ‎(PT)</option>
                    <option value="english‎">English - United Kingdom ‎(UK)‎</option>
                </select>
            </div>
            <div class="user-style">
                <p><?php echo $professor[0][0];?></p>
                <div class="container-circle"><img src="../image/default-user-icon-4.jpg" alt="User"></div>
                <div class="edit-profile"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path></svg></div>
            </div>
        </nav>
    </header>
    <section class="container-menu">
        <ul>
            <li><a href="cursos.php">c</a></li>
            <!-- <li><a href="#">t</a></li> -->
            <!-- <li><a href="#">a</a></li> -->
            <li class="logout"><a href="login.php"><i class="fa">&#xf00d;</i></a></li>
        </ul>
    </section>
    <section class="container-principal">
        <?php
        // var_dump(count($disciplinas)); 
        // count($disciplinas)
        for ($i=0; $i < count($disciplinas); $i++) { 
            echo "<div class='container-content-principal'>";
            echo "<h1 id='title'>" . $disciplinas[$i][0] . ":</h1>";
            echo "<div class='section-container'>";
            for ($j=0; $j < count($disciplinas[$i]) - 1; $j++) { 
                echo "<a href='turma.php'><div class='number-section'><h3>" . $disciplinas[$i][$j + 1] . "</h3></div></a>";
            }
            echo "</div>";
            echo "</div>";
        }
        ?>
    </section>
    <script>
    // Select
    // Varibles
    const selectLanguage = document.getElementById('select-language');
    var english = false;
    // Change Language
    function changeLanguage(){
        const valueLanguage = selectLanguage.value;
        if (valueLanguage == 'portuguese‎'){
            english = false;
            console.log(english);
        } else if(valueLanguage == 'english‎'){
            english = true;
            console.log(english);
        }

        // Changing Language
        var title = document.getElementById('title');
        switch (english) {
            case false:
                title.innerHTML = 'Matemática:';
                // Make call to database
                break;
            case true:
                title.innerHTML = 'Mathematics:';
                break;
            default:
                title.innerHTML = 'Matemática:';
                break;
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