<?php

namespace App\Models;

class Aluno {
    public $dataAluno;

    public function __construct() {
        
    }

    public function setDataAluno($x) {
        return $this->dataAluno = $x;
    }
    public function setNameAluno() {
        return $this->dataAluno[0][0];
    }
    public function printAluno() {
        for ($i=0; $i < count($this->dataAluno) ; $i++) { 
            if ($this->dataAluno[$i][2] == 1) {
                echo "<div class='aluno' style=' background: #32E03F;'><h3>" . $this->dataAluno[$i][0] . "</h3><h3 class='numeroEstudante'>Número Estudante: " . $this->dataAluno[$i][1] . "</h3><h3 class='entrada'>Entrada: " . $this->dataAluno[$i][3] . "</h3></div>";
            } else {
                echo "<div class='aluno' style=' background: #ef6154;'><h3>" . $this->dataAluno[$i][0] . "</h3><h3 class='numeroEstudante'>Número Estudante: " . $this->dataAluno[$i][1] . "</h3><h3 class='saida'>Saída: " . $this->dataAluno[$i][4] . "</h3></div>";
            }
        }
    }
}