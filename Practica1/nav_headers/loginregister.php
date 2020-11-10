<?php
$logged = false;
$user = false;
$pass_not = false;
$user_not = false;
$user_req = false;
$pass_req = false;

if(isset($_COOKIE['contador']))
{ 
  // Caduca en un año 
  setcookie('contador', $_COOKIE['contador'] + 1, time()+(3600/2)); 
  $mensaje = 'Número de visitas: ' . $_COOKIE['contador']; 
} 
else 
{ 
  // Caduca en un año 
  setcookie('contador', 1, time() + (3600/2)); 
  $mensaje = 'Bienvenido a nuestra página web'; 
} 



//LOGIN

if(isset($_POST['submitL'])){

    session_start();
    
    if (session_id()){

        if ( (filter_has_var(INPUT_POST, 'user')) && (filter_has_var(INPUT_POST, 'pass')) ) {

            $user_input = (trim($_POST['user']));  
            $pass_input = (trim($_POST['pass']));

            if ( (strlen($user_input)==0) || (strlen($pass_input)==0) ) {  

                if((strlen($user_input)==0)){
                    $user_req = true;
                }
                if((strlen($pass_input)==0)){
                    $pass_req = true;
                }
                session_unset();
                session_destroy();

                header("Location:../index.php");
                $logged = false;
                                    
            }else {

                //Readin the FILE
                $cadena = file("./login_files/users.txt");

                for ($i=0; $i < (count($cadena)); $i++) { 

                    $checkUser = $cadena[$i];
                    
                    $checkUser = explode(";", $checkUser);

                    if(($checkUser[0] === $user_input) && ($checkUser[1] === $pass_input)){

                        $_SESSION['user'] = $user_input;
                        $_SESSION['pass'] = $pass_input;
                        $_SESSION['role'] = $checkUser[2];
                        $_SESSION['name'] = $checkUser[3];
                        $_SESSION['surname'] = $checkUser[4];
                        $_SESSION['user_valid'] = true;
                        $_SESSION['id'] = session_id();
                        setcookie('user', $user_input);
                        $logged = true;                        
                    }
                }
            }
        } 
    }
}

//REGISTER

if(isset($_POST['submitR'])){
    $regOk = true;
    $findUser = false;
    session_start();
    if (session_id()){

        if ((filter_has_var(INPUT_POST, 'name')) && (filter_has_var(INPUT_POST, 'surname')) && (filter_has_var(INPUT_POST, 'user')) && (filter_has_var(INPUT_POST, 'pass')) && (filter_has_var(INPUT_POST, 'confirm_pass'))){
            $name_input = (trim($_POST['name']));  
            $surname_input = (trim($_POST['surname']));
            $user_input = (trim($_POST['user']));
            $pass_input = (trim($_POST['pass']));
            $confirm_pass = (trim($_POST['confirm_pass']));
            $role = "registered";

            if(is_numeric($name_input) || is_numeric($surname_input) || strcmp($pass_input, $confirm_pass) !== 0){
                $regOk = false;
            }else{

                $file = fopen("./login_files/users.txt", "a+");
                $cadena = file("./login_files/users.txt");

                for ($i=0; $i < (count($cadena)); $i++) { 

                    $checkUser = $cadena[$i];
                    
                    $checkUser = explode(";", $checkUser);

                    if(($checkUser[0] === $user_input)){
                        $findUser = true;
                    }
                }

                if($findUser == false){
                    
                    if($file){
                        fwrite($file, "\n");
                        $data = sprintf("%s;%s;%s;%s;%s", $user_input, $pass_input, $role, $name_input, $surname_input);
                        file_put_contents('./login_files/users.txt', $data, FILE_APPEND);

                    }else{
                        echo "Failed to read users!!";
                    }
                }else{
                    echo '<script type="application/javascript">alert("User already in use")</script>';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/index.css">
    <script src="./js/control/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>


</body>
</html>