<?php session_start() ?>
<?php

error_reporting(0);

function getLine($radio){
    $menus = file("../files/menus.txt");
    $ret = [];

    for ($i=0; $i < count($menus); $i++) { 
        $linea = explode(";", $menus[$i]);
    
        if($linea[0] == $radio){
            $ret = $linea;
        }   
    }
    return $ret;
}




if(isset($_POST)){

    if(isset($_POST['modificar']) || isset($_POST['eliminar'])){

        if(isset($_POST['selection'])){
            $radioClicked = $_POST['selection'];
        }else{
            header("Refresh:0; url=admin-menus.php");
        }
    }

    if(isset($_POST['selection']) && isset($_POST['nuevo'])) header("Refresh:0; url=admin-menus.php");
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

    <?php 
    if(isset($_POST['selection'])){
    ?>

    <?php 
        if(isset($_POST['modificar'])){
    ?>

        <div id="menu-content">
            <h2>Item clicked:</h2>
            <table>
                <th>ID</th>
                <th>CATEGORY</th>
                <th>NAME</th>
                <th>PRICE</th>
                <tr>
                    <?php 
                        for ($i=0; $i < count(getLine($radioClicked)); $i++) { 
                            echo '<td id=td"'.$i.'">'.getLine($radioClicked)[$i].'</td>';
                        }
                    ?>
                </tr>
            </table>

            <h2>New values:</h2>
            <form action="#" method="POST">
                <div id="form">
                    <div>
                        <label>ID:</label>
                        <input name="id_plato" type="text" readonly value="<?php echo getLine($radioClicked)[0]; ?>">
                    </div>
                    <div>
                        <label>Category:</label>
                        <select name="category_plato" type="text" value="">
                        <?php
                            $file = file("../files/categories.txt");
                            $categorias = explode(";", $file[0]);
                            for ($i=0; $i < count($categorias) ; $i++) { 
                                echo '<option>'.$categorias[$i].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label>Name:</label>
                        <input name="nombre_plato" type="text" placeholder="Nuevo nombre" placeholder="New name here">
                    </div>
                    <div>
                        <label>Price:</label>
                        <input name="precio_plato" type="text" placeholder="Nuevo precio" placeholder="New price here">
                    </div>

                </div>

                <table id="botones">
                    <tr>
                        <td><input type="submit" name="modificar_txt" id="modificar" value="Aceptar cambios"></input></td>
                    </tr>
                </table>

            </form>
        </div>

        <?php }if(isset($_POST['eliminar'])){ 

            ?>

        <div id="menu-content">
            <h2>Item to delete:</h2>
            <table>
                <th>ID</th>
                <th>CATEGORY</th>
                <th>NAME</th>
                <th>PRICE</th>
                <tr>
                    <?php 
                    for ($i=0; $i < count(getLine($radioClicked)); $i++) { 
                        echo '<td id=td"'.$i.'">'.getLine($radioClicked)[$i].'</td>';
                    }
                    ?>
                </tr>
            </table>
        </div>
            <?php 
                $file = file("../files/menus.txt");
                for ($i=0; $i < count($file) ; $i++) { 
                    
                    for ($j=0; $j < strlen($file[$i]) ; $j++) { 
                        $plato = explode(";", $file[$i]);
                        if($plato[0] == $radioClicked){
                            $linea_fichero = $i+1;
                            break;
                        }
                    }
                }
                $file[($linea_fichero)-1] = "";
                if(file_put_contents("../files/menus.txt", $file)){
                    echo '<div class="loader"></div>';
                    echo "<div id='deleted'>";
                    echo '<h2 style="text-align:center;margin-top:30px;margin-bottom:30px">Deleted successfully</h2>';
                    echo "
                        <div id='back'>
                            <a href='admin-menus.php'><input type='text' value='Back'></input></a></td>
                        </div>";
                    echo "</div>";
                }
            ?>          
        <?php
                }
    } // Cierre if SELECTION

    if(!isset($_POST['selection'])){
        if(isset($_POST['nuevo'])){ ?>

            <h2>New values:</h2>
            <form action="#" method="POST">
                <div id="form">
                    <div>
                        <label>Category:</label>
                        <select name="category_plato" type="text" value="">
                        <?php
                            $file = file("../files/categories.txt");
                            $categorias = explode(";", $file[0]);
                            for ($i=0; $i < count($categorias) ; $i++) { 
                                echo '<option>'.$categorias[$i].'</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label>Name:</label>
                        <input name="nombre_plato" type="text" placeholder="Nuevo nombre" placeholder="New name here">
                    </div>
                    <div>
                        <label>Price:</label>
                        <input name="precio_plato" type="text" placeholder="Nuevo precio" placeholder="New price here">
                    </div>

                </div>
                <div id="añadir">
                    <input type="submit" name="nuevo_txt" id="añadir" value="Añadir plato"></input>
                </div>
            </form>
      <?php  }
    }
                if(isset($_POST['modificar_txt'])){
                    if(!is_nan($_POST['precio_plato']) || is_string($_POST['nombre_plato'])){

                        $file = file("../files/menus.txt");

                        for ($i=0; $i < count($file) ; $i++) { 
                            
                            for ($j=0; $j < strlen($file[$i]) ; $j++) { 
                                $plato = explode(";", $file[$i]);
                                if($plato[0] == $_POST['id_plato']){
                                    
                                    $linea_fichero = $i+1;
                                    $plato[0] = $_POST['id_plato'];
                                    $plato[1] = $_POST['category_plato'];
                                    $plato[2] = $_POST['nombre_plato'];
                                    $plato[3] = $_POST['precio_plato'];
                                    break;
                                }   
                            }
                        }

                    
                        $file[($linea_fichero)-1] = $_POST['id_plato'].";". $_POST['category_plato'].";".$_POST['nombre_plato'].";". $_POST['precio_plato']."\n";
                        if(file_put_contents("../files/menus.txt", $file)){
                            echo '<h2 style="text-align:center;margin-top:30px;margin-bottom:30px">Change made successfully</h2>';
                        }  
                        

                        
                    }else{
                        if(is_nan($_POST['precio_plato']) || !is_string($_POST['nombre_plato'])){
                            echo '<h2 style="text-align:center;margin-top:30px;margin-top:30px">Invalid parameters found:</h2>';
                            if(is_nan($_POST['precio_plato'])){
                                echo "<h2>Precio introducido: ".$_POST['precio_plato'] ."<i class='far fa-times-circle'></i></h2>" ;
                            }else{
                                echo "<h2>Precio introducido: ".$_POST['precio_plato'] ."<i class='far fa-check-circle'></i></h2>" ;
                            }

                            if(!is_string($_POST['nombre_plato'])){
                                if(!is_string($_POST['nombre_plato'])){
                                    echo "<h2>Nombre introducido: ".$_POST['nombre_plato'] ."<i class='far fa-times-circle'></i></h2>";
                                }else{
                                    echo "<h2>Nombre introducido: ".$_POST['nombre_plato'] ."<i class='far fa-check-circle'></i></h2>";
                                }
                            }
                        }
                    }

                    echo "
                    <div id='back'>
                        <a href='admin-menus.php'><input type='text' value='Back'></input></a></td>
                    </div>";

                }

                if(isset($_POST['nuevo_txt'])){
                    
                    $file = file("../files/menus.txt");
                    $mayor = 0;
                    $exist = false;
                    for ($i=0; $i < count($file) ; $i++) { 
                        
                        for ($j=0; $j < strlen($file[$i]) ; $j++) { 
                            $plato = explode(";", $file[$i]);
                            if($plato[0] > $mayor){
                                $mayor = $plato[0];
                            }

                            if($plato[2] == $_POST['nombre_plato']){
                                $exist = true;
                            break;
                            }

                        }
                    }
                    if($exist == false){
                        $file[(count($file))+1] = (($mayor)+1).";". $_POST['category_plato'].";".$_POST['nombre_plato'].";". $_POST['precio_plato']."\n";
                        if(file_put_contents("../files/menus.txt", $file)){
                            echo '<div class="loader"></div>';
                            echo "<div id='added'>";
                            echo '<h2 style="text-align:center;margin-top:30px;margin-bottom:30px">Added successfully</h2>';
                            echo "
                            <div id='back'>
                                <a href='admin-menus.php'><input type='text' value='Back'></input></a></td>
                            </div>";
                            echo "</div>";
                        }
                    }else{
                        echo '<h2 style="text-align:center;margin-top:30px;margin-bottom:30px">Already in the menu</h2>';
                    }
                }

        ?>

        
    <?php include 'footer.php' ?> 
    
</body>
</html>