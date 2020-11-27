<?php

/*$arr = [12,23,322,48,56,655,272,899,29,355,333,23,74,22,12,33,122,35,1123,445];
$max = 0;
$min = $arr[count($arr)-1];
sort($arr);*/


if(isset($_POST['submit'])){

    if(!empty($_POST['numbers'])){
        $numbers = $_POST['numbers'];

        $fraseArr = explode(",", $numbers);

        if(checkArr($fraseArr)){
            echo "<h2>Media [" .media($fraseArr)."]</h2>";
            $max = max($fraseArr);
            $min = min($fraseArr);

            echo "<h2>Maximo [".$max."]</h2>";
            echo "<h2>Minimo [".$min."]</h2>";
        }else{
            echo "<h1>Array incorrecta</h1>";
        }

    }

}


function checkArr($arr){
    $ret = true;
    foreach ($arr as $value) {
        if(!is_numeric($value)){
            $ret = false;
        }
    }
    return $ret;
}

function media($arr){
    $media = 0;

    $media = array_sum($arr) / count($arr);

    return $media;
}

/*

for ($i=0; $i < count($arr); $i++) { 


    $media = array_sum($arr) / count($arr);

    if($arr[$i] > $max){
        $max = $arr[$i];
    }

    //He intentado hacerlo sin usar min() pero no me salia, para el maximo tambien se puede con la funcion max()

    //$min = min($arr);

    //Luego se me ha ocurrido asignar a $min el ultimo valor del array e ir mirando desde ahi, en lugar del primer valor
    //podria haber asignado cualquier valor, mi problema venia de que habia asignado 0 a $min, entonces nunca habia un numero
    //inferior a ese, pero tampoco existia 0 en el array.
    if($arr[$i] < $min){
        $min = $arr[$i];
    }

    echo "[".$arr[$i]."]";

}

echo "<br>Media: " .$media;
echo "<br>Numero mas grande: " .$max;
echo "<br>Numero mas pequeño: " .$min;
*/

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
    <h1>Media, Maximo y Minimo</h1>
    <label>Introduce numeros separados por comas </label>
    <input type="text" name="numbers" placeholder="e.g: 15,16,90,200">
    <input type="submit" name="submit" value="Enviar">
</form>
    
</body>
</html>