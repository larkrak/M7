<?php

/*
$sequence1 = "actgactgactgactg";
$sequence2 = "acttagactaactgca";
$count = 0;


for ($i=0; $i < strlen($sequence1); $i++) { 
    
    if($sequence1[$i] != $sequence2[$i]){
        $count += 1;
    }

}

echo "Numero de posiciones NO coincidentes: " .$count;*/


if(isset($_POST['submit'])){

    if(!empty($_POST['cad1']) && !empty($_POST['cad2'])){

        if(!is_numeric($_POST['cad1']) && !is_numeric($_POST['cad2'])){

            $cad1 = $_POST['cad1'];
            $cad2 = $_POST['cad2'];

            $cad1 = str_split($cad1);
            $cad2 = str_split($cad2);

            if(count($cad1) == count($cad2)){
                $pos = checkPos($cad1, $cad2);
                if($pos > 0){
                    echo "<h1>Numero de posiciones no coincidentes => ".$pos."</h1>";
                }else{
                    echo "<h1>Son la misma cadena</h1>";
                }
            }else{
                checkPos($cad1, $cad2);
                echo "Cadenas de diferentes dimensiones";
            }
        
        }else{
            echo "<h1>Cadena incorrecta</h1>";
        }

    }

}

function checkPos($cad1, $cad2){
$count = 0;

    for ($i=0; $i < count($cad1); $i++) { 

        if($cad1[$i] != $cad2[$i]){
            $count += 1;
        }
    }
    return $count;
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
    <h1>Posiciones coincidentes: </h1>
    <label>Primera cadena de nucleotidos: </label>
    <input type="text" name="cad1" placeholder="e.g: actgactgactgactg">
    <label>Segunda cadena de nucleotidos: </label>
    <input type="text" name="cad2" placeholder="e.g: acttagactaactgca">
    <input type="submit" name="submit" value="Enviar">
</form>
    
</body>
</html>

