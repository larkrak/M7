<?php


session_start();



$users = file ('users.txt');

for ($i=0; $i < (count($users)); $i++) { 

    $checkUser = $users[$i];
    
    $checkUser = explode(";", $checkUser);

    if(($checkUser[0] === $_SESSION['user'])){
        $findUser = true;
        $username = $checkUser[0];
        $password = $checkUser[1];
        $role = $checkUser[2];
        if($checkUser[3] == 0){
            $visits = 1;
        }else{
            $visits = $checkUser[3] + 1;
        }
        
        $users[$i] = $username.";". $password.";".$role.";". $visits."\n";
        file_put_contents("users.txt", $users);
    }
}

if($findUser){

    unset($_SESSION);
    session_destroy();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"],$params["httponly"]);
    }
    header("Location:index.php");
}


?>