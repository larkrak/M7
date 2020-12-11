<?php 
require_once "model/user.class.php";
session_start();



function loadData($username, $pass, $role, $name, $surname) {
    $user = new User($username, $pass, $role, $name, $surname);
    return $user;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" style="display: grid; grid-template-columns: 100px 200px; column-gap: 10px; row-gap: 15px;">
        <label>Username</label>
        <input type="text" name="username" id="" placeholder="Username here...">
        <label>Password</label>
        <input type="password" name="password" id="" placeholder="Password here...">
        <label>Role</label>
        <input type="text" name="role" id="" placeholder="Role here...">
        <label>Name</label>
        <input type="text" name="name" id="" placeholder="Name here...">
        <label>Surname</label>
        <input type="text" name="surname" id="" placeholder="Surname here...">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $myUser = loadData($_POST['username'], $_POST['password'], $_POST['role'], $_POST['name'], $_POST['surname']);
            $_SESSION['userList'][] = $myUser;
            if(isset($_SESSION)){
                $userNum = 0;
                foreach ($_SESSION['userList'] as $user) {
                    $userNum += 1;
                    echo $user."<br>";
                }
            }
        }

        

    ?>
    
</body>
</html>

