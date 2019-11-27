<?php

namespace App\Models;

class Professor {
    public $name = 'Júlia Justino';
    public $email = 'juliajustino@gmail.com';
    public function __construct() {

    }

    public function setNameProfessor() {
        return $this->name;
    }

    public function setEmailProfessor() {
        return $this->email;
    }
}