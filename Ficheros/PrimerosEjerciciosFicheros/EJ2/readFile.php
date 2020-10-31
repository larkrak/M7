<?php


$archivo = fopen("file.txt", "r");

if($archivo == false){
    echo "Error al abrir el archivo";
}else{
/*
    $content = file_get_contents("file.txt");

    $textArray = explode(" ", $content);*/

    $filecontents = file_get_contents('file.txt');

    $words = preg_split('/[\s]+/', $filecontents, -1, PREG_SPLIT_NO_EMPTY);

    $arrayLetras = [];
    echo '<div>';
    echo '<table>';
    echo '<tr>';
    echo '  <th>Letter</td>';
    echo '  <th>Number</td>';
    echo '<tr>';

    for ($i=0; $i < count($words); $i++) { 
        $words[$i][0] = strtolower($words[$i][0]);
        $arrayLetras[$i] = $words[$i][0];
    }

    $arrayClean = (array_count_values($arrayLetras));

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