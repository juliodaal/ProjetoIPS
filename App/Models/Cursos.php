<?php
// Não fazo isto rela porque preciso de enviar valores da interface do admin.
// $disciplinaTurmas tem que ser igual ao valor que tem que enviar o admin para funcionar.
namespace App\Models;

class Cursos {
    public $disciplinaTurmas = [
        ['Matemática','Turma 1 M','Turma 2 M','Turma 3 M','Turma 4 M'],
        ['Logica','Turma 1 L','Turma 2 L','Turma 3 L','Turma 4 L'],
        ['Base de dados','Turma 1 B','Turma 2 B','Turma 3 B','Turma 4 B'],
        ['Progrmação para Internet','Turma 1 P','Turma 2 P','Turma 3 P','Turma 4 P']
    ];
    public function __construct() {
        
    }

    public function printDisciplinaTurmas() {
        for ($i=0; $i < count($this->disciplinaTurmas); $i++) { 
            echo "<div class='container-content-principal'>";
            echo "<h1 id='title'>" . $this->disciplinaTurmas[$i][0] . ":</h1>";
            echo "<div class='section-container'>";
            for ($j=0; $j < count($this->disciplinaTurmas[$i]) - 1; $j++) { 
                echo "<a href='turma.php'><div class='number-section'><h3>" . $this->disciplinaTurmas[$i][$j + 1] . "</h3></div></a>";
            }
            echo "</div>";
            echo "</div>";
        }
    }
}