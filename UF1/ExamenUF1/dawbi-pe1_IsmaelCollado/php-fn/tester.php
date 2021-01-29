<?php 

include "file.fn.php";

use function \proven\files\testear;
use function \proven\files\readAllLines;
use function \proven\files\writeAllLines;
use function \proven\files\readLinesWhereFieldIndex;
use function \proven\files\appendLine;
use function \proven\files\write;

echo "<h1>All products: </h1>";

echo '<pre>';
    print_r(readAllLines("../files/products.txt"));
echo '</pre>';


echo "<h1>Number of lines written</h1>";


// writeAllLines()

$a = ["3", "NOOOOOOOOOOOOOOOOOOOOOOOOOOO", "si", "vale", "caballo", "CACA"];

echo writeAllLines("../files/caca.txt", $a);


// echo "<h1>Find a value in file</h1>";

// if(readLinesWhereFieldIndex("../files/caca.txt", 5, "desc08")){
//     echo "SI·;";
// }else{
//     echo "NOE";
// }


// echo "<h1>Append a line in file</h1>";


// $a = "asd;si;no;talvez;\n";

// echo appendLine("../files/caca.txt", $a);


?>