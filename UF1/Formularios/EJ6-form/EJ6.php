<?php

if(isset($_POST['submit'])){
    if(isset($_POST['fecha'])){
        $fecha = $_POST['fecha'];
    }
}

function calcularEdad($fecha){
    list($dia,$mes,$ano) = explode("-",$fecha);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;

    if(date("d") < $dia){
        $dia_diferencia   = $dia - date("d");
    }else{
        $dia_diferencia   =  date("d") - $dia;
    }

    
    $ret = "Segun tus datos introducidos, tienes: " .$ano_diferencia. " años, con ".$mes_diferencia." meses y ".$dia_diferencia." dias";
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
        margin: auto;
        border: 1px solid black;
        display: flex;
        flex-direction: column; 
    }

    form > * {
        padding-top: 10px;
        padding-bottom: 10px;
        margin-top: 10px;
    }
    form input{
        width: 100px;
    }
    
    </style>
</head>
<body>

<form action="#" method="post">
    <label>Introduce la fecha:</label>
    <input type="text" name="fecha" placeholder="e.g: 10-10-2010">
    <input type="submit" name="submit" value="Calcular">
</form>

<p id="result"><?php if(isset($_POST['submit'])) echo calcularEdad($fecha) ?></p>
 
</body>
</html>