<?php
/*
 * logout page.
 * shows previus rating made by the user (read from a cookie),
 * if the cookie does not exist, shows the message 'no previous rating'.
 * asks the user to rate his/her experience with the application
 * from 1 to 5 and stores that value in a cookie,
 * and, finally, performs session data cleanup, removes session cookie 
 * and goes to index.php.
 * Restrictions: this script is only available to users with started session,
 * that is, users who are logged in the application.
 */

session_start();



if(isset($_SESSION['user'])){

    if(isset($_POST['submit'])){

        if(isset($_POST['estrellas'])){

            setcookie("puntuacion", $_POST['estrellas'], time()+3600);
            $_COOKIE['puntuacion'] = $_POST['estrellas'];

        }
    }
}else{
    header("Location:index.php");
}

    echo "<h3>Your last puntuation was: ".$_COOKIE['puntuacion']."</h3>";
    session_destroy();







?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAWBI-M07 PE1</title>
    </head>
    <body>
        <?php include_once "mainmenu.php"; ?>
        <h2>Logout page</h2>

        <form action="" method="post">
            <label>Select your puntuation:</label>
            <input name="estrellas" type="number" max="5" min="0">

            <input name="submit" type="submit" value="Send valoration">
        </form>

        <?php include_once "footer.php"; ?>
    </body>
</html>

