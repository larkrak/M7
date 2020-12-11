<?php

require_once 'model/dog.class.php';
require_once 'model/cat.class.php';
session_start();

if(isset($_POST['submitdog'])){
    $dog = new Dog($_POST['Specie'], $_POST['Color'], $_POST['Extremities'], $_POST['Name'], true);
    $_SESSION['dogs'][] = $dog;
    //var_dump($_SESSION['dogs']);

    foreach ($_SESSION['dogs'] as $dog) {
        echo $dog->talk();
        echo '<br>';
    }

}

if(isset($_POST['submitcat'])){
    $cat = new Cat($_POST['Specie'], $_POST['Color'], $_POST['Extremities'], $_POST['Name'], true, $_POST['Food']);
    $_SESSION['cats'][] = $cat;
    //var_dump($_SESSION['cats']);

    

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
    <label>Specie</label>
    <input type="text" name="Specie">
    <label>Color</label>
    <input type="text" name="Color">
    <label>Extremities</label>
    <input type="text" name="Extremities">
    <label>Name</label>
    <input type="text" name="Name">
    <label>Create dog</label>
    <input type="submit" value="submit" name="submitdog">
</form>

<form action="#" method="post" style="display: grid; grid-template-columns: 100px 200px; column-gap: 10px; row-gap: 15px;margin-top:50px">
    <label>Specie</label>
    <input type="text" name="Specie">
    <label>Color</label>
    <input type="text" name="Color">
    <label>Extremities</label>
    <input type="text" name="Extremities">
    <label>Name</label>
    <input type="text" name="Name">
    <label>Food</label>
    <input type="text" name="Food">
    <label>Create cat</label>
    <input type="submit" value="submit" name="submitcat">
</form>

<div>
    <h1>DOGS</h1>
    <p>

    <?php
        if(isset($_SESSION['dogs'])){
            foreach ($_SESSION['dogs'] as $cat) {
                echo $cat->talk();
                echo '<br>';
            }
        }
    ?>

    </p>
</div>
<div>
    <h1>CATS</h1>
    <p>

    <?php
        if(isset($_SESSION['cats'])){
            foreach ($_SESSION['cats'] as $cat) {
                echo $cat->talk();
                echo '<br>';
            }
        }
    ?>

    </p>
</div>
    
</body>
</html>