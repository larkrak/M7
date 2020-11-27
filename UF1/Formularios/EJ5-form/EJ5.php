<?php

$año = 2020;
$ret = "";

if(isset($_POST['submit'])){

    if(isset($_POST['year'])){
        echo esBisiesto($_POST['year']);
    }

}

function esBisiesto($año){

    if(($año % 100 != 0) &&($año % 4 == 0 || $año % 400 == 0)){
        $ret = "<h4 style='width:100%;text-align:center'>El año $año SI es bisiesto</h4>";
    }else{
        $ret = "<h4 style='width:100%;text-align:center'>El año $año NO es bisiesto</h4>";
    }
    return $ret;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    form{
        width: 30%;
        border: 1px solid black;
        padding: 20px;
        margin: auto;
        display: flex;
        flex-direction: column;
    }

    form input{
        width: 100px;
        border: none;
        padding: 10px;
        margin-top: 10px;
    }

    form input[type="text"]{
        border: 1px solid lightgrey;
    }


    </style>
</head>
<body>

<form action="#" method="post">
    <label>Year</label>
    <input type="text" name="year" placeholder="e.g 2020">
    <input type="submit" name="submit" value="Enviar">
</form>
    
</body>
</html>