<?php session_start() ?>

<?php 
error_reporting(0);
$logged = false;
$user = false;
$pass_not = false;
$user_not = false;
$user_req = false;
$pass_req = false;

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

$menus = file("../files/menus.txt");

$arrAp = [];
$arrF = [];
$arrM = [];
$arrD = [];
$arrDr = [];


for ($i=0; $i < count($menus); $i++) { 
    $linea = explode(";", $menus[$i]);

    if($linea[1] == 'appetiser'){
        array_push($arrAp, $linea[2], $linea[3]);
    }
    if($linea[1] == 'firstcourse'){
        array_push($arrF, $linea[2], $linea[3]);
    }
    if($linea[1] == 'maincourse'){
        array_push($arrM, $linea[2], $linea[3]);
    }
    if($linea[1] == 'dessert'){
        array_push($arrD, $linea[2], $linea[3]);
    }
    if($linea[1] == 'drink'){
        array_push($arrDr, $linea[2], $linea[3]);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/menus.css">
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

    <div class="bg-image grayscale blur"></div>

    <div class="menustext">
        <h1>Menus</h1>

        <div style="display: flex;flex-direction: row;">
            <div>
                <h2>Appetiser</h2>

                <?php
                    for ($i=0; $i < count($arrAp) ; $i+=2) { 
                        echo '<div class="plato"><h4>'.$arrAp[$i].'</h4><h4>'.$arrAp[$i+1].'</h4></div>'; 
 
                    }

                ?>
            </div>
            <div>
                <h2>First</h2>

                <?php

                    for ($i=0; $i < count($arrF) ; $i+=2) { 
                        echo '<div class="plato"><h4>'.$arrF[$i].'</h4><h4>'.$arrF[$i+1].'</h4></div>'; 
                           
                    }

                ?>
            </div>
            <div>
                <h2>Main</h2>

                <?php

                    for ($i=0; $i < count($arrM) ; $i+=2) { 
                        echo '<div class="plato"><h4>'.$arrM[$i].'</h4><h4>'.$arrM[$i+1].'</h4></div>'; 
                    }

                ?>
            </div>
            <div>
                <h2>Dessert</h2>

                <?php

                    for ($i=0; $i < count($arrD) ; $i+=2) { 
                        echo '<div class="plato"><h4>'.$arrD[$i].'</h4><h4>'.$arrD[$i+1].'</h4></div>'; 
                    }

                ?>
            </div>
            <div>
                <h2>Drink</h2>

                <?php

                    for ($i=0; $i < count($arrDr) ; $i+=2) { 
                        echo '<div class="plato"><h4>'.$arrDr[$i].'</h4><h4>'.$arrDr[$i+1].'</h4></div>'; 
                           
                    }

                ?>
            </div>
        </div>

    </div>
    <div class="opinions">
        <h2>Opinions</h2>
        <div>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half"></i>
        </div>
        <h3>288 comentaries</h3>

        <div class="trip_opinions">
            <div>
                <div class="grid_stars_date">   
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <div>
                        <p>2/11/2020</p>
                    </div>
                </div>
                <div class="user_opinion">
                    <p>Marc</p>
                    <p>Las mejores hamburguesas que he probado nunca</p>
                </div>

            </div>
            <div>
                <div class="grid_stars_date">   
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <div>
                        <p>2/11/2020</p>
                    </div>
                </div>
                <div class="user_opinion">
                    <p>Marc</p>
                    <p>Las mejores hamburguesas que he probado nunca</p>
                </div>
            </div>
            <div>
                <div class="grid_stars_date">   
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <div>
                        <p>2/11/2020</p>
                    </div>
                </div>
                <div class="user_opinion">
                    <p>Marc</p>
                    <p>Las mejores hamburguesas que he probado nunca</p>
                </div>
            </div>
            <div>
                <div class="grid_stars_date">   
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <div>
                        <p>2/11/2020</p>
                    </div>
                </div>
                <div class="user_opinion">
                    <p>Marc</p>
                    <p>Las mejores hamburguesas que he probado nunca</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?> 
    
</body>
</html>