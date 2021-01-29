<?php
/*
 * show a form to input data for a new product,
 * and sends to itself to validate and perfom persistence in file.
 * Restrictions: this script is only available to users with role 'admin'.
 */

include "php-fn/file.fn.php";
use function \proven\files\testear;
use function \proven\files\readAllLines;
use function \proven\files\appendLine;

session_start();

 if(isset($_SESSION['user'])){

    if(isset($_POST['submit'])){

        $data = $_POST['id']. ";" . $_POST['desc']. ";" . $_POST['preu']. ";" . $_POST['stock'] ."\n";

        if(appendLine("files/products.txt", $data)){
            echo "<h1>Added successfully</h1>";
        }else{
            echo "<h1>An error ocurred</h1>";
        }

    }


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAWBI-M07 PE1</title>
    </head>
    <body>
        <?php include_once "mainmenu.php"; ?>
        <h2>Form to add a new product</h2>
        
        <form action="" method="post">

            <label>Id</label>
            <input type="text" name="id" id="">
            <label>Descripcio</label>
            <input type="text" name="desc" id="">
            <label>Preu</label>
            <input type="text" name="preu" id="">
            <label>Stock</label>
            <input type="text" name="stock" id="">
            <input type="submit" name="submit" value="Send">
        </form>
        <?php include_once "footer.php"; ?>
    </body>
</html>

<?php }else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NO PERMISSION</title>
</head>
<body>
    <h1 style="text-align: center; width: 100%;">You cant acces to this area</h1>
</body>
</html>

<?php }