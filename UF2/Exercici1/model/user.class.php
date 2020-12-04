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