<?php

class Cat extends Animal implements Speaker{

    private $food;

    public function __construct($specie, $color, $extremities, $name, $food){
        
        $this->specie = $specie;
        $this->color = $color;
        $this->extremities = $extremities;
        $this->name = $name;
        $this->vertebrate = true;
        $this->food = $food;
    }
        
    public function getFood():String{
        return $this->food;
    }
    public function setFood(String $food){
        $this->food = $food;
    }

    public function talk(){
        $ret = "Miau";
        return $ret;
    }

}


?>