<?php

require_once 'model/animal.class.php';
require_once 'model/speaker.interface.php';

class Dog extends Animal implements Speaker{

    private $chip;

    public function __construct($specie, $color, $extremities, $name, $hasChip){
        
        $this->specie = $specie;
        $this->color = $color;
        $this->extremities = $extremities;
        $this->name = $name;
        $this->vertebrate = true;
        $this->chip = $hasChip;
    }
        
    public function getChip():bool{
        return $this->chip;
    }
    public function setChip(bool $chip){
        $this->chip = $chip;
    }

    public function talk(){
        $ret = "GUAU";
        return $ret;
    }

}


?>