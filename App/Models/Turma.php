<?php

namespace App\Models;

class Turma {
    public $turma;
    public $daysTurma;

    public function SetValueTurmas($x) {
        $this->turma = $x;
    }

    public function SetValueDaysTurmas($x) {
        $this->daysTurma = $x;
    }
    
    public function getTitleTurma() {
        return $this->turma[0][0]; 
    }

    public function getDataAlunos() {
        for ($i=1; $i < count($this->turma) ; $i++) { 
            echo "<div class='container-estudantes'>";
                for ($j=0; $j < 1; $j++) { 
                    echo "<a href='aluno.php?varA=" . $this->turma[$i][3] . "'><div class='estudantes'><h3>" . $this->turma[$i][0] . "</h3><h3>Entrada: " . $this->turma[$i][1] . "</h3><h3>Saída: " . $this->turma[$i][2] . "</h3></div></a>";
                }
            echo "<label class='container-checkbox-estudantes'>";
            echo "<input type='checkbox' class='checkboxClass'>";
            echo "<span class='checkmark'></span>";
            echo "</label>";
            echo "</div>";
        }
    }

    public function getDaysTurma() {
        for ($i=0; $i < count($this->daysTurma); $i++) { 
            echo "<input type='button' class='button-date' value='". $this->daysTurma[$i] ."'>";
        }
    } 
}