
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
            <li><a>Day Menu</a></li>
            <?php if(isset($_POST['submitL'])){
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'registered'){
                        echo '<li><a>View Menus</a></li>';
                    }
                    if($_SESSION['role'] == 'staff'){
                        echo '<li><a>Administrate menus</a></li>';
                    } 
                    if($_SESSION['role'] == 'admin'){
                        echo '<li><a href="nav_headers/comming-soon.php">Administrate users</a></li>';
                    } 
                }
            }else{
                echo '<li><a id="register">Register</a></li>';
            }
            
            ?>

            <!-- <li><a id="register">Register</a></li> -->
            <?php if(!($logged)){
                echo '<li><a id="login">Login</a></li>';
            }else{
                echo '<li><a href="nav_headers/logout.php" id="logout">Logout</a></li>';
                
            } ?>
        </ul>
    </nav>

    

    <div class="form_div">
        <i class="fas fa-times-circle"></i>
        <form action="http://localhost/M7/Practica1/index.php" method="post">
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
        <form action="http://localhost/M7/Practica1/index.php" method="post">
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

</body>
</html>