<?php

require_once "model/user.class.php";
$cadenas = file("./files/users.txt");

function loadData($username, $pass, $role, $name, $surname) {
    $user = new User($username, $pass, $role, $name, $surname);
    return $user;
}


function createUserLine($object){
    $object = $object -> __toString();
    $array = (explode("=", str_replace("]", ";", $object)));
    for ($i=0; $i < count($array); $i++) { 
        $array[$i] = substr($array[$i], 0, strpos($array[$i], ";"));
    }
    unset($array[0]);
    $array = (implode(";", $array));
    return $array;
}

if(isset($_POST['submit'])){
    $myUser = loadData($_POST['username'], $_POST['password'], $_POST['role'], $_POST['name'], $_POST['surname']);
    $line = createUserLine($myUser);
    //echo $line;
    if(file_get_contents('./files/users.txt')){
        file_put_contents('./files/users.txt', "\n", FILE_APPEND);
    }
    file_put_contents('./files/users.txt', $line, FILE_APPEND);
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

    <div>
        <p>
            <?php

            $file = fopen("./files/users.txt", "r");
            if ($file) {
                while (($búfer = fgets($file, 4096)) !== false) {
                    echo $búfer . "<br>";
                }
                if (!feof($file)) {
                    echo "Error: fallo inesperado de fgets()\n";
                }
                fclose($file);
            }

            ?>
        </p>
    </div>
</body>
</html>


