<?php

session_start();

function indice($arr = [], $str){
    $key = "Not found!";
    if(array_search($str, $arr)){
        $key = (array_search($str, $arr)) + 1;
    }
    return $key;
}


$frase = "";
$palabra = "";
$nuevaPalabra = "";

$_SESSION['frase'];

if(isset($_POST['submit'])){

    if(empty($_POST['nuevaPalabra'])){
        
        if(is_string($_POST['frase']) && is_string($_POST['palabra'])){

            if(!empty($_POST['frase']) && !empty($_POST['palabra'])){
                $frase = $_POST['frase'];
            
                $palabra = $_POST['palabra'];
    
                $_SESSION['frase'] = $frase;
                $_SESSION['fraseOg'] = $frase;
                $fraseArr = explode(" ", $frase);
                $pos = indice($fraseArr, $palabra);
            }

            if(empty($_POST['frase']) && !empty($_POST['palabra'])){
                $palabra = $_POST['palabra'];
                $fraseArr = explode(" ", $_SESSION['frase']);
                $pos = indice($fraseArr, $palabra);
            }
            
    
        }

    }else{

        if (empty($_POST['frase']) && empty($_POST['palabra'])) {
            
            if($_SESSION['frase']){

                $_SESSION['frase'] .= " " .$_POST['nuevaPalabra'];

                $frase = $_SESSION['frase'];
                $fraseArr = explode(" ", $frase);
                $pos = indice($fraseArr, $palabra);

            }

        }

    }

    if(empty($_POST['frase'])){
        echo '<h2>Frase original: [' .$_SESSION['fraseOg'].']';
    }else{
        echo '<h2>Frase original: [' .$_SESSION['frase'].']';
    }

    if(!empty($_SESSION['nuevaPalabra'])){
        echo '<h2>Frase con la nueva palabra: [' .$_SESSION['frase'].']';
    }
    if(!empty($pos)){
        echo '<h2>Posicion de la palabra ['.$palabra.'] => ['.$pos.']</h2>';
    }else{
        echo '<h2>No has introducido palabra a buscar</h2>';
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

<form action="#" method="post">
    <h1>Buscador de palabras</h1>
    <label>Introduce la frase: </label>
    <input type="text" name="frase" placeholder="frase aqui">
    <label>Introduce la palabra a buscar:</label>
    <input type="text" name="palabra" placeholder="palabra aqui">
    <label>Añadir palabra a la frase: </label>
    <input type="text" name="nuevaPalabra" placeholder="nueva palabra aqui">
    <input type="submit" name="submit" value="Enviar">
</form>
    
</body>
</html>