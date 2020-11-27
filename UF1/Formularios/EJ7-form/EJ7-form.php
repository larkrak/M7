<?php

$f1 = 1;
$f2 = 0;
$fib1 = 0;
$fib2 = 0;

if(isset($_POST['submit'])){

    if(is_numeric($_POST['fibn'])){
        $n = (is_numeric($_POST['fibn']) ? (int)$_POST['fibn'] : 0);
        // $check1 = $_POST['fib1'];
        // $check2 = $_POST['fib2'];

        /*
        if(empty($_POST['fib1']) && empty($_POST['fib2'])){
            fibonacci($n, $f1, $f2);
        }else{
            if(is_numeric($_POST['fib1']) && is_numeric($_POST['fib2'])){

                if(checkFibo($n, $check1, $check2)){
                    fibonacci($n, $f1, $f2);
                }else{
                    echo "<h2>Serie no encontrada</h2>";
                }
            }
        }*/
        fibonacci($n, $f1, $f2);
    }

}

function checkFibo($n, $check1, $check2){

    $f1 = 1;
    $f2 = 0;
    $ret = false;
    $flag1 = false;
    $flag2 = false;

    for ($i=0; $i < $n; $i++){
        $suma = $f1 + $f2;

        if($check1 == $suma || $check1 == $f1 || $check1 == $f2){
            $flag1 = true;
            //echo "f1-> si";
        }
        if($check2 == $suma || $check2 == $f1 || $check2 == $f2){
            $flag2 = true;
            //echo "f2 -> si";
        }

        $f1 = $f2;
        $f2 = $suma;
    }

    if($flag1 == true && $flag2 == true){
        $ret = true;
    }

    return $ret;

}


function fibonacci($n, $f1, $f2){

    echo "<table style='width:80%;margin:auto;'>";
    echo "<tr class='spacer' style='background-color:lightgrey'>";

    echo "<th style='width:33%'>Suma</th>";
    echo "<th>Fibonacci 1</th>";
    echo "<th>Fibonacci 2</th>";
    echo "<tr>";
        for ($i=0; $i < $n; $i++) { 
            echo "<tr>";
            $suma = $f1 + $f2;
            echo "<td style='border:1px solid black;padding:5px;text-align:center'>".$suma." = ".$f1." + ".$f2."</td>";
            echo "<td style='border:1px solid black;text-align:center'>".$f1."</td>";
            echo "<td style='border:1px solid black;text-align:center'>".$f2."</td>";
            $f1 = $f2;
            $f2 = $suma;
            echo "</tr>";
        }
    echo "</tr>";
    echo "</tr>";
    echo "</table>";

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

<form action="#" method="post">
    <h1>Serie Fibonacci a medida</h1>
    <label>Introduce cuantos numeros de fibonacci quieres </label>
    <input type="number" name="fibn" placeholder="Fibonacci">
    <!-- <label>Introduce los dos numeros por los que quieres empezar</label>
    <input type="number" name="fib1" placeholder="Fibonacci">
    <input type="number" name="fib2" placeholder="Fibonacci"> -->

    <input type="submit" name="submit" value="Enviar">
</form>
    
</body>
</html>