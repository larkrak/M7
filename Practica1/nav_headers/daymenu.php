<?php session_start() ?>

<?php 
error_reporting(0);
$dayMenus = file("../files/daymenu.txt");
$categories = file_get_contents("../files/categories.txt");
$numDia = date("w");
$arrayMenu = ["appetisser" => "", "firstcourse" => "", "maincourse" => "", "dessert" => "", "drink" => ""];
$categoryCorrect = true;

$categoriesArray = explode(";", $categories);


for ($i=0; $i < (count($dayMenus)); $i++){

    $menu = explode(";", $dayMenus[$i]);
    
    $id = substr($menu[0], -1);

    if($id == $numDia){

        $arrayMenu[$menu[1]] = $menu[2];

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/daymenu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/control/index.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

<nav>
        <div class="logo"><h4>Sunset Burguer</h4></div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="#">Day Menu</a></li>
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

    <div class="daymenutext">
      <h1>Day menu </h1>
      <?php 
        for ($i=0; $i < count($arrayMenu)-1 ; $i++) { 
            echo '<h3 style="text-transform:uppercase">'.$categoriesArray[$i].'</h3>';
            echo '<h5 style="padding:20px">'.$arrayMenu[$categoriesArray[$i]].'</h5>';
        }
      ?>
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