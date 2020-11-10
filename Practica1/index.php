<?php
session_start();
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
    <link rel="stylesheet" href="style/index.css">
    <script src="js/control/index.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Sunset Burguer</title>
</head>
<body>

<div>

<nav>
        <div class="logo"><h4>Sunset Burguer</h4></div>
        <ul class="nav-links">
            <li><a>Home</a></li>
            <li><a>Day Menu</a></li>
            <?php
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'registered'){
                        echo '<li><a href="nav_headers/comming-soon.php">View Menus</a></li>';
                    }
                    if($_SESSION['role'] == 'staff'){
                        echo '<li><a href="nav_headers/comming-soon.php">View Menus</a></li>';
                        echo '<li><a href="nav_headers/comming-soon.php">Administrate menus</a></li>';
                    } 
                    if($_SESSION['role'] == 'admin'){
                        echo '<li><a href="nav_headers/comming-soon.php">View Menus</a></li>';
                        echo '<li><a href="nav_headers/comming-soon.php">Administrate menus</a></li>';
                        echo '<li><a href="nav_headers/comming-soon.php">Administrate users</a></li>';
                    } 
                }else{
                    echo '<li><a id="register">Register</a></li>';
                }
            
            
            ?>

            <!-- <li><a id="register">Register</a></li> -->
            <?php if(!isset($_SESSION['user_valid'])){
                echo '<li><a id="login">Login</a></li>';
            }else{
                echo '<li><a href="nav_headers/logout.php" id="logout">Logout</a></li>'; 
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

    <div class="bg-text">
      <h1>Sunset burguer</h1>
      <p>¡Be a real fooder!</p>
    </div>

    <?php
    if($logged){
        echo '<div class="bg-text-user">';
            echo '<h1>Welcome back, '.$_SESSION['name'].' '.$_SESSION['surname'].'</h1>';
        echo '</div>'; 
    }
    ?>
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
    <?php include 'nav_headers/footer.php' ?> 
</body>
</html>