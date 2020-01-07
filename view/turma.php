<?php

require_once '../App/Models/Turma.php';
require_once '../App/Models/Average.php';
use App\Models\{Turma, Average};
$average = 
[
    [100,'Dia'],
    [95,'Semana'],
    [75,'Mes'],
    [70,'Trimestre'],
    [65,'Semestre'],
    [60,'Ano']
];

session_start();
$sessionUserId = $_SESSION['email'] ?? null;
$tipoUser = $_SESSION['tipo'] ?? null;
if (!$sessionUserId  || $tipoUser == 3) {
    header("location:login.php");
    die;
}
$turma = new Turma;
$turma->tipoUser($tipoUser);
$arraynNameTurma = $_GET['varible'];
$disciplinaTurma = '';
$nameTurma = '';
$count = 0;
for ($k=0; $k < strlen($arraynNameTurma); $k++) { 
    if ($arraynNameTurma[$k] == ",") {
    break;
    } else {
        $nameTurma = $nameTurma . $arraynNameTurma[$k];
        $count++;
    }
}
for ($p= $count + 1; $p < strlen($arraynNameTurma); $p++) { 
    $disciplinaTurma = $disciplinaTurma . $arraynNameTurma[$p];
}
require_once '../App/Controllers/selectTurma.php';
require_once '../App/Controllers/selectDay.php';
$turma->SetValueTurmas($Array);
$turma->SetValueDaysTurmas($ArrayDay);

$_SESSION['nomeDisciplina'] = $disciplinaTurma;
$_SESSION['nomeTurma'] = $turma->getTitleTurma();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Turma | SGA</title>
</head>
<body>
<div class="overclick" id="overclick"></div>
<section class="day" id="day">
    <form action="" method="post">
        <?php echo $turma->getDaysTurma();?>
    </form>
</section>
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
                <p><?php echo $_SESSION['nome']?></p>
                <!-- <div class="container-circle"><img src="../assets/image/default-user-icon-4.jpg" alt="User"></div> -->
                <!-- <div class="edit-profile"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path></svg></div> -->
            </div>
        </nav>
    </header>
    <section class="container-menu">
        <ul>
            <li><a href="cursos.php">d</a></li>
            <li><a href="turma.php" style="display:none;">t</a></li>
            <!-- <li><a href="#">a</a></li> -->
            <li class="logout"><a href="../App/Controllers/logOut.php"><i class="fa">&#xf00d;</i></a></li>
        </ul>
    </section>
    <section class="container-principal">
           <div class="container-content-principal">
           <p style=" color: darkblue;" id="disciplina"><?php echo $disciplinaTurma;?>/</p>
                <h1 id="title-turma"><?php  echo $turma->getTitleTurma();?></h1>
                <span>
                            <form action="" method="post">
                                <!-- <input type="date" name="bday" id="calendar" onchange="changeDate()"> -->
                                <input type="button" class="button-days" id="button-days" value="Selecione O Dia">
                            </form>
                        </span>
                <div class="section-container" id="section-container">
                    <?php echo $turma->getDataAlunos(); ?>
                </div>
           </div>
           <p style=""><div style="display:inline-block; position:relative; width: 25px; height: 25px; border-radius:7px; background: #fdfc47;">
            <div style="position:absolute; top: 0; left: 0; width:100%; height: 100%; background: black; opacity: .2; border-radius:7px;"></div>
           </div>O amarelo indica que um aluno deixou a sala de aula mais tarde do que a hora marcada ou não marcou sua hora de saída.</p>
    
           <?php
           if (!$sessionUserId  || $tipoUser != 1) {
            echo "<div class='container-buttons'>";
            echo "<input type='submit' id='submitE' value='Submeter para E+' name='<?php echo$numProf?>'>";
            echo "</div>";
            echo "<div class='container-average'>";
            echo "<h1 id='MediaAssis'>Media de assistencias:</h1>";
            echo "<div class='average'><h3 id='average'>0%</h3><span id='diaid'>dia</span></div>";
            echo "</div>";
            }
           ?>
    </section>
    <script>
    const calendar = document.getElementById('calendar');
    const day = document.getElementById('day');
    var sectionContainer = document.getElementById('section-container');
    function changeDate() {
        var x = calendar.value;
    }
    const buttonDays = document.getElementById('button-days');
    const overclick =  document.getElementById('overclick');
    var saveDays = '';
    var validaData = true;
    buttonDays.addEventListener('click', function() {
        day.classList.toggle('right');
        overclick.style.display = 'inline-block';
    });
    overclick.addEventListener('click', function() {
        day.classList.remove('right');
        overclick.style.display = 'none';
    });
    const buttonDate = document.querySelectorAll('.button-date');
    const url = '../App/Controllers/setHoursTurma.php';
    const opts = { crossDomain: true };
    const titleTurma = document.getElementById('title-turma');
    [].forEach.call( buttonDate, function(buttonDates) {
        const dateDay = buttonDates.value;
        const allUrl = `${url}?varb=${titleTurma.innerHTML},${dateDay}`;
        buttonDates.addEventListener('click', function () {
            buttonDates.classList.toggle('under');
            saveDays = buttonDates.value;
            validaData = false;
            $.get(allUrl, opts, (data) => {
                sectionContainer.innerHTML = data;
                    var media = 0;
                    
                    media = (calcMedia()[1] * 100) / calcMedia()[0];
                    const average = document.getElementById('average');
                    var d = media.toFixed(2)
                    average.innerHTML = `${d}%`;
            });
        });
    });
    function calcMedia() {
                    const valEntrada = document.querySelectorAll('.container-estudantes a div h3:nth-of-type(2)');
                    var assistencia = 0;
                    var noAssistencia = 0; 
                    var numeroEstudantes = 0;
                    var auxi = '';

                    [].forEach.call(valEntrada, function(valEntradas) {
                        var auxi = valEntradas.innerHTML;
                        var auxtwoi = auxi.slice(9);
                        numeroEstudantes++;

                        switch (auxtwoi) {
                            case '0':
                                noAssistencia++;
                                break;
                        
                            default:
                                assistencia++;
                                break;
                        }

                    });

                    return [numeroEstudantes, assistencia];
                }
    const submitE = document.getElementById('submitE');
    const allUrlE = '../App/Controllers/sendDataE.php';
    const containerEstudante = document.querySelectorAll('.container-estudantes');
    const Estudante = document.querySelectorAll('.container-estudantes a');
    var countNumrEstudante = 0;
    [].forEach.call(containerEstudante, function(containerEstudantes) {
        countNumrEstudante++;
    });
    [].forEach.call(Estudante, function(Estudantes) {
        Estudantes.addEventListener('click', function() {
            if (validaData == true) {
                alert('Seleccionar uma Data');
                Estudantes.href="";
            }
        });
    });
    const nomeDisciplina =  document.getElementById('disciplina').innerHTML.slice(0,-1);
    var checkedTrue = 0;
    var checkedFalse = 0;
    var passTrue = true;
    submitE.addEventListener('click',function(valEntrada){
    // const valEntrada = document.querySelectorAll('.container-estudantes a div h3:nth-of-type(2)');
    const checkboxClass = document.querySelectorAll('.checkboxClass');
    [].forEach.call(checkboxClass, function(checkboxClasss) {
        if (checkboxClasss.checked == true){
            checkedTrue++;
        } else {
            checkedFalse++;
        }
    });
    var mediaAssis = 0;
                mediaAssis = (calcMedia()[1] * 100) / calcMedia()[0];
                var d = mediaAssis.toFixed(2);

    let optsE = {
        titleTurma: titleTurma.innerHTML,
        numeroEstudantes: countNumrEstudante,
        media: d,
        materia: nomeDisciplina,
        numProfessor: submitE.name,
        day: saveDays,
        crossDomain: true
    }
    if (calcMedia()[1] != checkedTrue && passTrue == true) {
        alert('Teus Checks são defferentes ao número de assitências registradas, mas se quiseres enviar de qualquer forma. So carrega no Submeter para E+ novamente');
        passTrue =  false;
    } else {
        $.get(allUrlE, optsE, (data) => {
                alert(data);
        });
        passTrue = true;
    }
        checkedTrue= 0;
        checkedFalse = 0;
    });
    // Change Language
    var english = false;
    function changeLanguage(){
        const selectLanguage = document.getElementById('select-language');
        const valueLanguage = selectLanguage.value;
        if (valueLanguage == 'portuguese‎'){
            english = false;
        } else if(valueLanguage == 'english‎'){
            english = true;
        }
        const disciplina = document.getElementById('disciplina');
        const entrada = document.querySelectorAll('.entrada');
        const saida = document.querySelectorAll('.saida');
        const urlE = '../App/Controllers/changeLanguageCursosToEnglish.php';
        const urlP = '../App/Controllers/changeLanguageCursosToPortugues.php';
        var ArrayTitles = [];
        var title = disciplina.innerHTML;
            var conttitle = '';
            var conttitletwo = '';
            let u = 0;
            for (let i = 0; i < title.length; i++) {
                u = i;
                if (title[i] == '/') {
                    break;
                } else {
                    conttitle = conttitle + title[i];
                } 
            }
            var x = conttitle + ':';
            ArrayTitles.push(x);
            var Arrayconttitle  = [];
            Arrayconttitle.push(conttitle);
        const optstwo = {Array: Arrayconttitle, crossDomain: true};
        const opts = {Array: ArrayTitles,crossDomain: true};
        const MediaAssis = document.getElementById('MediaAssis');
        const diaid = document.getElementById('diaid');
        switch (english) {
            case true:
                $.get(urlE, opts, (data) => {
                    ArrayT = [];
                    var contTitles = '';
                    for (let i = 0; i < data.length; i++) {
                        if (data[i] == ",") {
                            ArrayT.push(contTitles);
                            contTitles = '';
                        } else {
                            contTitles = contTitles + data[i];
                        }
                        
                    }
                    disciplina.innerHTML = `${ArrayT[0]}/`;
                    buttonDays.value = "Select Day";
                    [].forEach.call(entrada, function(entradas) {
                        var auxr = entradas.innerHTML;
                        var resultAuxr = auxr.replace('Entrada: ',' Entry: ');
                        entradas.innerHTML = resultAuxr;
                    });
                    [].forEach.call(saida, function(saidas) {
                        var auxrs = saidas.innerHTML;
                        var resultAuxrs = auxrs.replace('Saída: ',' Exit: ');
                        saidas.innerHTML = resultAuxrs;
                    });
                    submitE.value = 'Submit to E+';
                    MediaAssis.innerHTML = 'Average presence:';
                    diaid.innerHTML = 'Day';
                });
                break;
            case false:
                $.get(urlP, optstwo, (data) => {
                    ArrayT = [];
                    var contTitles = '';
                    for (let i = 0; i < data.length; i++) {
                        if (data[i] == ":") {
                            ArrayT.push(contTitles);
                            contTitles = '';
                        } else {
                            contTitles = contTitles + data[i];
                        }
                        
                    }
                    disciplina.innerHTML = `${ArrayT[0]}/`;
                    buttonDays.value = "Selecione O Dia";
                    [].forEach.call(entrada, function(entradas) {
                        var auxr = entradas.innerHTML;
                        var resultAuxr = auxr.replace(' Entry: ','Entrada: ');
                        entradas.innerHTML = resultAuxr;
                    });
                    [].forEach.call(saida, function(saidas) {
                        var auxrs = saidas.innerHTML;
                        var resultAuxrs = auxrs.replace(' Exit: ','Saída: ');
                        saidas.innerHTML = resultAuxrs;
                    });
                    submitE.value = 'Submeter para E+';
                    MediaAssis.innerHTML = 'Media de assistencias:';
                    diaid.innerHTML = 'Dia';
                });
                break;
        
            default:
                break;
        }
    }
    </script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script>
  $(window).scroll(function(){
        day.classList.remove('right');
        overclick.style.display = 'none';
    });
  </script>
    <script src="../js/main.js"></script>
</body>
</html>