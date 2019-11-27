<?php

namespace App\Models;

class Aluno {
    public $name;
    public $number;
    public $horaEntrada;
    public $horaSaida;

    public function __construct() {
        
    }

    public function setNameAluno() {
        return $this->name = 'João Pedro da Mata Cristão';
    }

    public function setNumber() {
        return $this->number = 190208014;
    }
    
    public function setHourEntrada() {
        return $this->horaEntrada = '08:30';
    }

    public function setHourSaida() {
        return $this->horaSaida = '12:30';
    }
    public function calcTotalHours() {
        // return $this->setHourSaida - $this->setHourEntrada;
    }
    
    public function printAluno() {
        echo "<div class='aluno'><h3>" . $this->setNameAluno() . "</h3><h3>Número Estudante: " . $this->setNumber() . "</h3><h3>Entrada: " . $this->setHourEntrada() . "</h3><h3>Saída: " . $this->setHourSaida() . "</h3><h3>Total: " . "4" . " horas</h3></div>";
    }
}