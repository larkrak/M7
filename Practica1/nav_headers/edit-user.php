<?php session_start() ?>
<?php

function getLine($radio)
{
    $users = file("../files/users.txt");
    $ret = [];

    for ($i = 0; $i < count($users); $i++) {
        $linea = explode(";", $users[$i]);

        if ($linea[0] == $radio) {
            $ret = $linea;
        }
    }
    return $ret;
}




if (isset($_POST)) {

    if (isset($_POST['modificaruser']) || isset($_POST['eliminaruser'])) {

        if (isset($_POST['selectionuser'])) {
            $radioClicked = $_POST['selectionuser'];
        } else {
            header("Refresh:0; url=admin-users.php");
        }
    }

    if (isset($_POST['selectionuser']) && isset($_POST['nuevouser'])) header("Refresh:0; url=admin-users.php");
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
        <div class="logo">
            <h4><a href="index.php">Sunset Burguer</a></h4><?php if (isset($_SESSION['name'])) echo "<h3>" . $_SESSION['name'] . " " . $_SESSION['surname'] . "</h3>" ?>
        </div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="daymenu.php">Day Menu</a></li>
            <?php
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'registered') {
                    echo '<li><a href="menus.php">View Menus</a></li>';
                }
                if ($_SESSION['role'] == 'staff') {
                    echo '<li><a href="menus.php">View Menus</a></li>';
                    echo '<li><a href="admin-menus.php">Administrate menus</a></li>';
                }
                if ($_SESSION['role'] == 'admin') {
                    echo '<li><a href="menus.php">View Menus</a></li>';
                    echo '<li><a href="admin-menus.php">Administrate menus</a></li>';
                    echo '<li><a href="admin-users.php">Administrate users</a></li>';
                }
            } else {
                echo '<li><a id="register">Register</a></li>';
            }


            ?>

            <!-- <li><a id="register">Register</a></li> -->
            <?php if (!isset($_SESSION['user_valid'])) {
                echo '<li><a id="login">Login</a></li>';
            } else {
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

            if (isset($_POST['submitL'])) {
                if (!($logged)) {
                    echo '<script type="application/javascript">alert("Datos incorrectos")</script>';
                    if (!$user_req) {
                        if ($user_input) echo '<label style="font-size:15px;color:red">User incorrect!</label>';
                    } else {
                        echo '<label style="font-size:15px;color:red">User required!</label>';
                    }
                }
            }

            ?>
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password here...">
            <?php

            if (isset($_POST['submitL'])) {
                if (!($logged)) {
                    if (!$pass_req) {
                        if ($pass_not) echo '<label style="font-size:15px;color:red">Password incorrect!</label>';
                    } else {
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



    if (isset($_POST['selectionuser'])) {

        if (isset($_POST['modificaruser'])) {

    ?>

            <div id="menu-content">
                <h2>Item clicked:</h2>
                <table>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>ROLE</th>
                    <th>NAME</th>
                    <th>SURNAME</th>
                    <tr>
                        <?php
                        for ($i = 0; $i < count(getLine($radioClicked)); $i++) {
                            echo '<td id=td"' . $i . '">' . getLine($radioClicked)[$i] . '</td>';
                        }
                        ?>
                    </tr>
                </table>

                <h2>New values:</h2>
                <form action="#" method="POST">
                    <div id="form">
                        <div>
                            <label>ID:</label>
                            <input name="username" type="text" readonly value="<?php echo getLine($radioClicked)[0]; ?>">
                        </div>
                        <div>
                            <label>Password:</label>
                            <input name="password" type="password" value="" placeholder="Password here">

                        </div>
                        <div>
                            <label>Role:</label>
                            <select name="role_user" type="text" value="">
                                <?php
                                $file = file("../files/roles.txt");
                                $roles = explode(";", $file[0]);
                                for ($i = 0; $i < count($roles); $i++) {
                                    echo '<option>' . $roles[$i] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label>Name:</label>
                            <input name="name" type="text" placeholder="New name here">
                        </div>
                        <div>
                            <label>Surname:</label>
                            <input name="surname" type="text" placeholder="Surname here">
                        </div>

                    </div>

                    <table id="botones">
                        <tr>
                            <td><input type="submit" name="modificaruser_txt" id="modificar" value="Aceptar cambios"></input></td>
                        </tr>
                    </table>

                </form>
            </div>
        <?php
        }

        if (isset($_POST['eliminaruser'])) {

        ?>

            <div id="menu-content">
                <h2>Item to delete:</h2>
                <table>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>ROLE</th>
                    <th>NAME</th>
                    <th>SURNAME</th>
                    <tr>
                        <?php
                        for ($i = 0; $i < count(getLine($radioClicked)); $i++) {
                            echo '<td id=td"' . $i . '">' . getLine($radioClicked)[$i] . '</td>';
                        }
                        ?>
                    </tr>
                </table>
            </div>
            <?php

            $file = file("../files/users.txt");
            for ($i = 0; $i < count($file); $i++) {
                for ($j = 0; $j < strlen($file[$i]); $j++) {
                    $user = explode(";", $file[$i]);
                    if ($user[0] == $_POST['selectionuser']) {
                        $linea_fichero = $i + 1;
                        break;
                    }
                }
            }
            $file[($linea_fichero) - 1] = "";
            if (file_put_contents("../files/users.txt", $file)) {
                echo '<div class="loader"></div>';
                echo "<div id='deleted'>";
                echo '<h2 style="text-align:center;margin-top:30px;margin-bottom:30px">Deleted successfully</h2>';
                echo "
                        <div id='back'>
                            <a href='admin-users.php'><input type='text' value='Back'></input></a></td>
                        </div>";
                echo "</div>";
            }
            ?>
        <?php
        }

        ?>

        <?php


    } // Cierre if SELECTION

    if (!isset($_POST['selectionuser'])) {

        //echo "No sel";

        if (isset($_POST['modificaruser_txt'])) {

            //var_dump($_POST);

            if (!ctype_digit($_POST['name']) && !ctype_digit($_POST['surname'])) {

                $file = file("../files/users.txt");
                $user = "";
                for ($i = 0; $i < count($file); $i++) {
                    for ($j = 0; $j < strlen($file[$i]); $j++) {
                        $user = explode(";", $file[$i]);
                        if ($user[0] == $_POST['username']) {
                            $linea_fichero = $i + 1;
                            break;
                        }
                    }
                }

                $file[($linea_fichero) - 1] = $_POST['username'] . ";" . $_POST['password'] . ";" . $_POST['role_user'] . ";" . $_POST['name'] . ";" . $_POST['surname'] . "\n";

                if (file_put_contents("../files/users.txt", $file)) {
                    echo '<h2 style="text-align:center;margin-top:30px;margin-bottom:30px">Change made successfully</h2>';
                }
            } else {

                if (is_string($_POST['name']) || ctype_digit($_POST['surname'])) {
                    echo '<h2 style="text-align:center;margin-top:30px;margin-top:30px">Invalid parameters found:</h2>';
                    if (ctype_digit($_POST['name'])) {
                        echo "<h2>Nombre introducido: " . $_POST['name'] . "<i class='far fa-times-circle'></i></h2>";
                    } else {
                        echo "<h2>Nombre introducido: " . $_POST['name'] . "<i class='far fa-check-circle'></i></h2>";
                    }

                    if (is_string($_POST['surname'])) {
                        if (ctype_digit($_POST['surname'])) {
                            echo "<h2>Apellido introducido: " . $_POST['surname'] . "<i class='far fa-times-circle'></i></h2>";
                        } else {
                            echo "<h2>Apellido introducido: " . $_POST['surname'] . "<i class='far fa-check-circle'></i></h2>";
                        }
                    }
                }
            }

            echo "
                        <div id='back'>
                            <a href='admin-users.php'><input type='text' value='Back'></input></a></td>
                        </div>";
            echo "</div>";
        }

        if (isset($_POST['nuevouser'])) {

        ?>
            <h2>New User:</h2>
            <form action="#" method="POST">
                <div id="form">

                    <div>
                        <label>Username:</label>
                        <input name="username_new" type="text" placeholder="Nuevo nombre de usuario">
                    </div>

                    <div>
                        <label>Contraseña:</label>
                        <input name="password_new" type="password" placeholder="Nuevo nombre de usuario">
                    </div>

                    <div>
                        <label>Category:</label>
                        <select name="role_new" type="text" value="">
                            <?php
                            $file = file("../files/roles.txt");
                            $roles = explode(";", $file[0]);
                            for ($i = 0; $i < count($roles); $i++) {
                                echo '<option>' . $roles[$i] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Name:</label>
                        <input name="name_new" type="text" placeholder="Nuevo nombre">
                    </div>
                    <div>
                        <label>Surname:</label>
                        <input name="surname_new" type="text" placeholder="Nuevo apellido">
                    </div>

                </div>
                <div id="añadir">
                    <input type="submit" name="nuevo_user_txt" id="añadir" value="Añadir usuario"></input>
                </div>
            </form>
    <?php
        }

        if(isset($_POST['nuevo_user_txt'])){
                    
            $file = file("../files/users.txt");
            $mayor = 0;
            $exist = false;
            for ($i=0; $i < count($file) ; $i++) { 
                
                for ($j=0; $j < strlen($file[$i]) ; $j++) { 
                    $user = explode(";", $file[$i]);

                    if($user[0] == $_POST['username_new']){
                        $exist = true;
                        break;
                    }

                }
            }
            if($exist == false){
                $file[(count($file))+1] = $_POST['username_new'].";". $_POST['password_new'].";".$_POST['role_new'].";". $_POST['name_new'].";". $_POST['surname_new']."\n";
                if(file_put_contents("../files/users.txt", $file)){
                    echo '<div class="loader"></div>';
                    echo "<div id='added'>";
                    echo '<h2 style="text-align:center;margin-top:30px;margin-bottom:30px">Added successfully</h2>';
                }
            }else{
                echo '<h2 style="text-align:center;margin-top:30px;margin-bottom:30px">Already got an account</h2>';
            }

            echo "
                    <div id='back'>
                        <a href='admin-users.php'><input type='text' value='Back'></input></a></td>
                    </div>";
                    echo "</div>";

    }
}


    ?>


    <?php include 'footer.php' ?>

</body>

</html>