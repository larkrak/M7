<?php


$archivo = fopen("file.txt", "r");
$arrayLetras = [];

if($archivo == false){
    echo "Error al abrir el archivo";
}else{

    $words = getWords("file.txt");

    echo '<div>';
    echo '<table>';
    echo '<tr>';
    echo '  <th>Letter</td>';
    echo '  <th>Number</td>';
    echo '<tr>';

    $arrayClean = (array_count_values($words));

    $array_keys = array_keys($arrayClean);
    $array_values = array_values($arrayClean);

    for ($i=0; $i < count($arrayClean) ; $i++) { 

        if (preg_match("/^[a-z]$/", $array_keys[$i])) {
            echo '<tr>';
            echo '<td>'.$array_keys[$i].'</td>';
            echo '<td>'.$array_values[$i].'</td>';
            echo '</tr>';
        }
    }
    echo '</table>';
    echo '</div>';
}


function getWords(String $rutaArchivo){

    $archivo = fopen($rutaArchivo, "r");

    if($archivo == false){
        echo "Error al abrir el archivo";
    }else{
        $filecontents = file_get_contents($rutaArchivo);
        $words = preg_split('/[\s]+/', $filecontents, -1, PREG_SPLIT_NO_EMPTY);
    }

    for ($i=0; $i < count($words); $i++) { 
        $words[$i][0] = strtolower($words[$i][0]);
        $arrayLetrasLower[$i] = $words[$i][0];
    }

    return $arrayLetrasLower;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/table.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>



    
</body>
</html>