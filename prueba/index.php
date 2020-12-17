<?php

session_start();
error_reporting(0);


if(isset($_POST['submitL'])){

    $visits = 0;

    if(isset($_POST['user']) && isset($_POST['pass'])){

        $users = file ('users.txt');
        
        for ($i=0; $i < (count($users)); $i++) { 

            $checkUser = $users[$i];
            
            $checkUser = explode(";", $checkUser);

            if(($checkUser[0] === $_POST['user'] && $checkUser[1] === $_POST['pass'])){
                $findUser = true;
                $username = $checkUser[0];
                $password = $checkUser[1];
                $role = $checkUser[2];
                $visits = $checkUser[3];
                
                // $users[$i] = $username.";". $password.";".$role.";". $visits."\n";
                // file_put_contents("users.txt", $users);

                $_SESSION['user'] = $username;
                $_SESSION['userVisits'] = array($username => $visits); 

                echo $_SESSION['user'];
            }

        }


        echo '<pre>';
            print_r($_SESSION);
        echo '</pre>';

    }

}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/control/index.js"></script>
    <title>Document</title>
</head>
<body>

<div>

<nav>
        <div class="logo"><h4><a href="index.php">Sunset Burguer</a></h4><?php if(isset($_SESSION['name'])) echo "<h3>".$_SESSION['name']." ".$_SESSION['surname']."</h3>" ?></div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="nav_headers/daymenu.php">Day Menu</a></li>
            <?php
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'registered'){
                        echo '<li><a href="nav_headers/menus.php">View Menus</a></li>';
                    }
                    if($_SESSION['role'] == 'staff'){
                        echo '<li><a href="nav_headers/menus.php">View Menus</a></li>';
                        echo '<li><a href="nav_headers/admin-menus.php">Administrate menus</a></li>';
                    } 
                    if($_SESSION['role'] == 'admin'){
                        echo '<li><a href="nav_headers/menus.php">View Menus</a></li>';
                        echo '<li><a href="nav_headers/admin-menus.php">Administrate menus</a></li>';
                        echo '<li><a href="nav_headers/admin-users.php">Administrate users</a></li>';
                    } 
                }else{
                    echo '<li><a id="register">Register</a></li>';
                }
            
            
            ?>

            <!-- <li><a id="register">Register</a></li> -->
            <?php if(!isset($_SESSION['user'])){
                echo '<li><a id="login">Login</a></li>';
            }else{
                echo '<li><a href="logout.php" id="logout">Logout</a></li>'; 
            } ?>
        </ul>
    </nav>

    

    <div class="form_div">
        <i class="fas fa-times-circle"></i>
        <form action="#" method="post">
            <label>User</label>
            <input type="text" name="user" placeholder="User here...">
            
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password here...">
            
            <input type="submit" name="submitL" value="Login">
        </form>

    </div>

    <div class="form_div-reg">
        <i class="fas fa-times-circle"></i>
        <form action="#" method="post">
            <label>Your name:</label>
            <input type="text" name="name" placeholder="Name here...">
            <input type="text" name="surname" placeholder="Surname here...">
            <label>Username</label>
            <input type="text" name="user" placeholder="Username here...">
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password here...">
            <input type="password" name="confirm_pass" placeholder="Confirm password...">
            <input type="submit" name="submitR" value="Register">
        </form>

    </div>
</html>