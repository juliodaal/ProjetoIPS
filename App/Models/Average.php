<?php

namespace App\Models;

class Average {

    public function __construct() {
        
    }
    
    public function averageDia() {
        return [100,'Dia'];
    }

    public function averageSemana() {
        return [95,'Semana'];
    }

    public function averageMes() {
        return [75,'Mes'];
    }

    public function averageTrimestre() {
        return [70,'Trimestre'];
    }

    public function averageSemestre() {
        return [65,'Semestre'];
    }

    public function averageAno() {
        return [60,'Ano'];
    }
    public function totalAverage() {
        return [$this->averageDia(),$this->averageSemana(),$this->averageMes(),$this->averageTrimestre(),$this->averageSemestre(),$this->averageAno()];
    }
    public function printAverage(){
        for ($k=0; $k < count($this->totalAverage()); $k++) { 
            for ($h=0; $h < 1; $h++) { 
                echo "<div class='average'><h3>" . $this->totalAverage()[$k][0] . "%</h3><span>" . $this->totalAverage()[$k][1] . "</span></div>";
            }
        }
    }
}