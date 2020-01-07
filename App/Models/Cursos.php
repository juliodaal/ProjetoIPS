<?php
// Não fazo isto rela porque preciso de enviar valores da interface do admin.
// $disciplinaTurmas tem que ser igual ao valor que tem que enviar o admin para funcionar.
namespace App\Models;

class Cursos {
    public $disciplinaTurmas;
    public function __construct() {
        
    }
    public function SetValueDisciplinaTurmas($x) {
        $this->disciplinaTurmas = $x;
    }
    public function printDisciplinaTurmas() {
        for ($i=0; $i < count($this->disciplinaTurmas); $i++) { 
            echo "<div class='container-content-principal'>";
            $y = $this->disciplinaTurmas[$i][0];
            echo "<h1 class='title'>" . $this->disciplinaTurmas[$i][0] . ":</h1>";
            echo "<div class='section-container'>";
            for ($j=0; $j < count($this->disciplinaTurmas[$i]) - 1; $j++) { 
                $x = $this->disciplinaTurmas[$i][$j + 1];
                echo "<a href='turma.php?varible=$x,$y' ><div class='number-section'><h3>" . $this->disciplinaTurmas[$i][$j + 1] . "</h3></div></a>";
            }
            echo "</div>";
            echo "</div>";
        }
    }
}