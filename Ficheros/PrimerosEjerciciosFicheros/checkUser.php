<?php

$archivo = fopen("credenciales.txt", "r");

if($archivo == false){
    echo "Error al abrir el archivo";
}else{

    $cadena = file("credenciales.txt");
    
    $user = $cadena[0];
    $pass = $cadena[1];

    $user = explode(" ", $user);
    $pass = explode(" ", $pass);

    $userClean = trim($user[1]);
    $passClean = trim($pass[1]);

    if(isset($_POST['submit'])){

        if(isset($_POST['user']) && isset($_POST['pass'])){

            $user = trim($_POST['user']);
            $pass = trim($_POST['pass']);

            if((strcmp($user, $userClean) == 0) && (strcmp($pass, $passClean) == 0)){
                echo "HOLA";
            }else{
                echo "Credenciales incorrectas";
            }


            

        }

    }

}




?>