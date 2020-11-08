<?php

$logged = false;
$user = false;
$pass_not = false;
$user_not;
$user_req = false;
$pass_req = false;


if(isset($_POST['submit'])){
    
    $_SESSION['user_valid'] = false;

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
                        $_SESSION['user_valid'] = true;
                        $logged = true;

                    }

                }


                // if (($user_input === "a") && ($pass_input === "a")) {  //check values
                //     $logged = true;
                //     //header("Location: index.php");  //redirect to application page
                // }else {  
                //     if($user_input === "a" && ($pass_input !== "a")){
                //         $user_not = true;
                //     }else{
                //         $pass_not = true;
                //     }
                // }
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
    
    <nav>
        <div class="logo"><h4>Sunset Burguer</h4></div>
        <ul class="nav-links">
            <li><a>Home</a></li>
            <?php if(isset($_POST['submit'])){
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'visitor'){
                        echo '<li><a>Day Menu</a></li>';
                    }
                    
                }
            } ?>
            <li><a>Register</a></li>
            <?php if(!$logged){
                echo '<li><a id="login">Login</a></li>';
            }else{
                echo '<li><a id="logout">Logout</a></li>';
                
                
            } ?>

            
        </ul>
    </nav>

    

    <div class="form_div">
        <i class="fas fa-times-circle"></i>
        <form action="http://localhost/M7/Practica1/index.php" method="post">
            <label>User</label>
            <input type="text" name="user" placeholder="User here...">
            <?php 

            if(isset($_POST['submit'])){
                if(!$logged){
                    echo '<script type="application/javascript">alert("Datos incorrectos")</script>';
                    if(!$user_req){
                        if($user_input) echo '<label style="font-size:15px;color:red">User incorrect!</label>';
                    }else{
                        echo '<label style="font-size:15px;color:red">User required!</label>';
                    }
                } 
            }

            ?>
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password here...">
            <?php 

            if(isset($_POST['submit'])){
                if(!$logged){
                    if(!$pass_req){
                        if($pass_not) echo '<label style="font-size:15px;color:red">Password incorrect!</label>';
                    }else{
                        echo '<label style="font-size:15px;color:red">Password required!</label>';
                    }
                   
                } 
            }

            ?>
            <input type="submit" name="submit" value="Login">
        </form>

    </div>

</body>
</html>