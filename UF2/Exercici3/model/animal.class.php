<?php

class Animal{

    private $specie;
    private $color;
    private $numberextremities;
    private $name;
    private $vertebrate;

    public function __construct(
        string $specie,
        string $color,
        int $numberextremities,
        string $name,
        bool $vertebrate
    ){
        $this->specie = $specie;
        $this->color = $color;
        $this->numberextremities = $numberextremities;
        $this->name = $name;
        $this->vertebrate = $vertebrate;
        
    }

    public function getSpecie(): String{
        return $this->specie;
    }
    public function setSpecie(String $specie){
        $this->specie = $specie;
    }
    public function getColor(): String{
        return $this->color;
    }
    public function setColor(String $color){
        $this->color = $color;
    }
    public function getExtremities(): int{
        return $this->numberextremities;
    }
    public function setExtremities(int $extremities){
        $this->numberextremities = $extremities;
    }
    public function getName(): String{
        return $this->name;
    }
    public function setName(String $name){
        $this->name = $name;
    }
    public function getVertebrate(): bool{
        return $this->vertebrate;
    }
    public function setVertebrate(bool $vertebrate){
        $this->vertebrate = $vertebrate;
    }


}


?>