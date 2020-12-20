<?php

include "php-fn/file.fn.php";
use function \proven\files\testear;
use function \proven\files\readAllLines;

session_start();

if(isset($_SESSION['user'])){


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAWBI-M07 PE1</title>
    </head>
    <body>
        <?php include_once "mainmenu.php"; ?>
        <h2>List of all products</h2>

        <table style="width: 50%;">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Precio</td>
                <td>Stock</td>
            </tr>

            <?php

                // echo '<pre>';
                // print_r (readAllLines("files/products.txt"));
                // echo '</pre>';

                $data = readAllLines("files/products.txt");
                for ($i=0; $i < count($data) ; $i++) { 
                    
                    $dataLine = explode(";", $data[$i]);

                    echo "<tr>";
                    for ($j=0; $j < count($dataLine) ; $j++) { 

                        echo "<td style='border:1px solid black'>".$dataLine[$j]."</td>";

                    }
                    echo "</tr>";

                }

            ?>

        </table>


        <p>Page under construction!</p>
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
