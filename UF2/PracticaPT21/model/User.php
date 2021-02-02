<?php

class User{
    private int $id;
    private string $username;
    private string $password;
    private string $rol;
    private string $name;
    private string $surname;

    public function construct(int $id, string $username=null, string $password=null, string $rol=null, string $name=null, string $surname=null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;
        $this->name = $name;
        $this->surname = $surname;
    }

    //GETTERS & SETTERS
    function getPrivateintid() { 
        return $this->privateintid; 
    } 

    function setPrivateintid($privateintid) {  
        $this->privateintid = $privateintid; 
    } 
    


    //ToString
    public function toString(){
        $result = "User {";
        sprintf("[id = %s]", $this->id);
        sprintf("[userName = %s]", $this->username);
        sprintf("[password = %s]", $this->password);
        sprintf("[rol = %s]", $this->rol);
        sprintf("[name = %s]", $this->name);
        sprintf("[surname = %s]", $this->surname);
        $result .= "}";
        return $result;
    }


}


?>