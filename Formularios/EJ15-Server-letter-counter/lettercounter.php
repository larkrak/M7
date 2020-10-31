<?php
/**
* compute number of occurrencies of accepted values in a sequence.
*/
//include libraries of functions.
include 'php-fn/debug.php';
require 'php-fn/sequence.fn.php';
//use library namespace.
use proven\sequencies as sequencies;
//define input data
$acceptedChars = sequencies\DNA_RNA_NUCLEOTIDES;
$sequence = sequencies\generateRandomSequence( $acceptedChars, 20 );
//invoke method countOccurrencies() to create and calculate counters
//$validChars = sequencies\DNA_NUCLEOTIDES;
$validChars = sequencies\DNA_RNA_NUCLEOTIDES;
$occurrencies = sequencies\countOccurrencies( $sequence, $validChars );
//print results
//proven\debug\print_r ($occurrencies);
//proven\debug\var_dump ($occurrencies);

/*if(isset($_POST['submit'])){
    $seq = sequencies\getSequence($_POST['cadena'], $acceptedChars);

    for ($i=0; $i < count($seq) ; $i++) { 
        echo '<pre>'.$seq.'</pre>';
    }

}*/

if(isset($_POST['submit'])){

    if(isset($_POST['radio']) && isset($_POST['cadena'])){
        $sel = $_POST['radio'];
        $cad = $_POST['cadena'];
        if($sel == 'RNA'){
            $validChars = sequencies\RNA_NUCLEOTIDES;
            $occurrencies = sequencies\countOccurrencies( $cad, $validChars );
            
            if($occurrencies["rejected"] > 0){
                echo "<h1>Cadena [".$cad."] no valida</h1>";
            }else{
                echo '<table>';
                echo '<tr>';
                    foreach($occurrencies as $items => $item){
                            echo '<td>' .$items. ' => </td>';
                            echo '<td>' .$item. '</td>';
                            echo '</tr>';
                    }
                echo '</tr>';
                echo '</table>';
            }
        }
        if($sel == 'DNA'){
            $validChars = sequencies\DNA_NUCLEOTIDES;
            $occurrencies = sequencies\countOccurrencies( $cad, $validChars );

            if($occurrencies["rejected"] > 0){
                echo "<h1>Cadena [".$cad."] no valida</h1>";
            }else{
                echo '<table>';
                echo '<tr>';
                    foreach($occurrencies as $items => $item){
                            echo '<td>' .$items. ' => </td>';
                            echo '<td>' .$item. '</td>';
                            echo '</tr>';
                    }
                echo '</table>';

                //proven\debug\print_r ($occurrencies);

                /*foreach ($occurrencies as $items => $item) {
                        echo $items;
                }*/
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
    <title>Document</title>
    <link rel="stylesheet" href="../style/form.css">
    
</head>
<body>
    <form action="#" method="POST">
        <label>Introduce una cadena</label>
        <input type="text" name="cadena" placeholder="cadena">
        <div>
            <input type="radio" name="radio" value="DNA">DNA
            <input type="radio" name="radio" value="RNA">RNA
        </div>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>