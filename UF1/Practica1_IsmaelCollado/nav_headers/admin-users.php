<?php session_start() ?>
<?php

error_reporting(0);




function printArrInTable($arr){
    $cont = 0;
    for ($i=0; $i < count($arr) ; $i++) { 

        if($cont == 0){
            echo '<tr>';
            $idRadio = $arr[$i];
        }
        
        echo '<td>'.$arr[$i].'</td>'; 

        $cont++;
        if($cont == 4){
            echo '<td style="text-align:center"><input value="'.$idRadio.'" name="selection" type="radio"></td>';
            echo '</tr>';
            $cont = 0;
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/admin-users.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/control/index.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>

<nav>
        <div class="logo"><h4><a href="index.php">Sunset Burguer</a></h4><?php if(isset($_SESSION['name'])) echo "<h3>".$_SESSION['name']." ".$_SESSION['surname']."</h3>" ?></div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="daymenu.php">Day Menu</a></li>
            <?php
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'registered'){
                        echo '<li><a href="#">View Menus</a></li>';
                    }
                    if($_SESSION['role'] == 'staff'){
                        echo '<li><a href="#">View Menus</a></li>';
                        echo '<li><a href="admin-menus.php">Administrate menus</a></li>';
                    } 
                    if($_SESSION['role'] == 'admin'){
                        echo '<li><a href="#">View Menus</a></li>';
                        echo '<li><a href="admin-menus.php">Administrate menus</a></li>';
                        echo '<li><a href="admin-users.php">Administrate users</a></li>';
                    } 
                }else{
                    echo '<li><a id="register">Register</a></li>';
                }
            
            
            ?>

            <!-- <li><a id="register">Register</a></li> -->
            <?php if(!isset($_SESSION['user_valid'])){
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
            <?php 

            if(isset($_POST['submitL'])){
                if(!($logged)){
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

            if(isset($_POST['submitL'])){
                if(!($logged)){
                    if(!$pass_req){
                        if($pass_not) echo '<label style="font-size:15px;color:red">Password incorrect!</label>';
                    }else{
                        echo '<label style="font-size:15px;color:red">Password required!</label>';
                    }      
                } 
            }
            ?>
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

    <div id="users-content">
            <form action="edit-user.php" method="POST">
                <table>
                    <tr>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>ROLE</th>
                        <th>NAME</th>
                        <th>SURNAME</th>
                        <th>SELECTION</th>
                    </tr>
                    <?php 
                    $users = file("../files/users.txt", FILE_IGNORE_NEW_LINES );
                    $cont = 0;

                    for ($i=0; $i < count($users); $i++) { 
                        $linea = explode(";", $users[$i]);
                        

                        if($cont == 0){
                            echo '<tr>';
                            $idRadio = $i;
                        }

                        for ($j=0; $j < count($linea) ; $j++) {  
                            $cont++;       
                            echo '<td>'.$linea[$j].'</td>'; 
                            if($cont == (count($linea))){
                                echo '<td style="text-align:center"><input value="'.$linea[0].'" name="selectionuser" type="radio"></td>';
                                echo '</tr>';
                                $cont = 0;
                            }
                        }
                        
                    }
                    ?>

                </table>

                <table id="botones">
                    <tr>
                        <td><input type="submit" name="modificaruser" id="modificar" value="Modificar seleccionado"></input></td>
                        <td><input type="submit" name="eliminaruser" id="eliminar" value="Eliminar seleccionado"></input></td>
                        <td><input type="submit" name="nuevouser" id="nuevo" value="Añadir nuevo elemento"></input></td>
                    </tr>
                </table>
            </form>
    </div>

        
    <?php include 'footer.php' ?> 
    
</body>
</html>