<?php
/*
 * login page.
 * shows a form to input username and password and sends to itself to validate
 * credentals,
 * If credentials are valid, navigate to index.php, otherwise show error and
 * remain is this page.
 * Restrictions: this script is only available to users without active session.
 */

session_start();


if(!isset($_SESSION['user'])){

    if(isset($_POST['submit'])){

        if(isset($_POST['user']) && isset($_POST['pass'])){

            $users = file ('files/users.txt');
            
            
            for ($i=0; $i < (count($users)); $i++) { 

                $checkUser = $users[$i];
                
                $checkUser = explode(";", $checkUser);

                if(($checkUser[1] === $_POST['user'] && $checkUser[2] === $_POST['pass'])){
                    $userValid = true;
                    $username = $checkUser[1];
                    $password = $checkUser[2];
                    $role = $checkUser[3];

                    $_SESSION['user'] = $username;

                    header("Location:index.php");

                }else{
                    $userValid = false;
                }
            }
        }
    }

}else{
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAWBI-M07 PE1</title>
    </head>
    <body>
        <?php include_once "mainmenu.php"; ?>
        <h2>Login page</h2>
        <?php

            echo "<p style='color:red'>Login incorrect</p>";


        ?>
        <form action="#" method="post">
            <label>User</label>
            <input type="text" name="user" placeholder="User here...">
            
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password here...">
            
            <input type="submit" name="submit" value="Login">
        </form>
        <?php include_once "footer.php"; ?>
    </body>
</html>