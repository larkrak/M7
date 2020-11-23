<?php session_start() ?>

<?php 

error_reporting(0);

if (!isset($_SESSION['user_valid'])) {
    header("Location: ../index.php");
    exit;
}

if(isset($_POST['submitL'])){
    
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
                $cadena = file("../files/users.txt");
                
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

#Lectura del menu, per categoria.

$menus = file("../files/menus.txt", FILE_IGNORE_NEW_LINES );

$arrAp = [];
$arrF = [];
$arrM = [];
$arrD = [];
$arrDr = [];


for ($i=0; $i < count($menus); $i++) { 
    $linea = explode(";", $menus[$i]);

    if($linea[1] == 'appetiser'){
        array_push($arrAp, $linea[0], $linea[1], $linea[2], $linea[3]);
    }
    if($linea[1] == 'firstcourse'){
        array_push($arrF, $linea[0], $linea[1], $linea[2], $linea[3]);
    }
    if($linea[1] == 'maincourse'){
        array_push($arrM, $linea[0], $linea[1], $linea[2], $linea[3]);
    }
    if($linea[1] == 'dessert'){
        array_push($arrD, $linea[0], $linea[1], $linea[2], $linea[3]);
    }
    if($linea[1] == 'drink'){
        array_push($arrDr, $linea[0], $linea[1], $linea[2], $linea[3]);
    }
}

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
    <link rel="stylesheet" href="../style/admin-menus.css">
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
                        echo '<li><a href="menus.php">View Menus</a></li>';
                    }
                    if($_SESSION['role'] == 'staff'){
                        echo '<li><a href="menus.php">View Menus</a></li>';
                        echo '<li><a href="admin-menus.php">Administrate menus</a></li>';
                    } 
                    if($_SESSION['role'] == 'admin'){
                        echo '<li><a href="menus.php">View Menus</a></li>';
                        echo '<li><a href="admin-menus.php">Administrate menus</a></li>';
                        echo '<li><a href="comming-soon.php">Administrate users</a></li>';
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

    


    <div id="menu-content">
            <form action="edit-file.php" method="POST">
                <table>
                    <th>ID</th>
                    <th>CATEGORY</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>Selection</th>
                    
                    <?php 

                    printArrInTable($arrAp);
                    printArrInTable($arrF);
                    printArrInTable($arrM);
                    printArrInTable($arrD);
                    printArrInTable($arrDr);

                    ?>
                    </tr>
                </table>

                <table id="botones">
                    <tr>
                        <td><input type="submit" name="modificar" id="modificar" value="Modificar seleccionado"></input></td>
                        <td><input type="submit" name="eliminar" id="eliminar" value="Eliminar seleccionado"></input></td>
                        <td><input type="submit" name="nuevo" id="nuevo" value="Añadir nuevo elemento"></input></td>
                    </tr>
                </table>
            </form>



    </div>

    <?php include 'footer.php' ?> 
    
</body>
</html>