<?php

class User {

    private $username;
    private $password;
    private $role;
    private $name;
    private $surname;

    public function __construct(
        string $username,
        string $password,
        string $role,
        string $name,
        string $surname
    ){
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->name = $name;
        $this->surname = $surname;
        
    }

    public function getUsername(): String{
        return $this->username;
    }
    public function setUsername(String $username){
        $this->username = $username;
    }

    public function getPassword(): String{
        return $this->password;
    }
    public function setPassword(String $password){
        $this->password = $password;
    }

    public function getRole(): String{
        return $this->role;
    }
    public function setRole(String $role){
        $this->role = $role;
    }

    public function getName(): String{
        return $this->name;
    }
    public function setName(String $name){
        $this->name = $name;
    }

    public function getSurname(): String{
        return $this->surname;
    }
    public function setSurname(String $surname){
        $this->surname = $surname;
    }
    public function __toString(){
        return sprintf(
            "%s{[username=%s][password=%s][role=%s][name=%s][surname=%s]}", 
            get_class($this),
            $this->username,
            $this->password,
            $this->role,
            $this->name,
            $this->surname
        );
    }

}



?>