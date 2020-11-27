
<?php
//initial sequence
/*
$sequence = "actgactgactgactg";
$sequence2 = "";
$nuclComp = array(
    'a' => 't',
    't' => 'a',
    'c' => 'g',
    'g' => 'c'
);

echo "Initial sequence->" .$sequence;

for ($i=0; $i < strlen($sequence) ; $i++) { 
    
    $sequence2 .= $nuclComp[$sequence[$i]];

}

echo "<br>";
echo "Complementary sequence ->" .$sequence2;*/

include '../FuncionesUtiles/funciones.php';

if(isset($_POST['submit'])){

    if(isset($_POST['cad'])){

        if(!empty($_POST['cad'])){

            if(!is_numeric($_POST['cad'])){
                $cad = $_POST['cad'];
                if(complSeq($cad) != ""){
                    echo "<h1>Initial sequence [".$cad."]</h1>";
                    echo "<h1>Complementary sequence [".complSeq($cad)."]</h1>";
                }else{
                    echo "<h2>Some invalid character!!</h2>";
                }
            }
        }
    }
}

function complSeq($cad){
    $nuclComp = array(
        'a' => 't',
        't' => 'a',
        'c' => 'g',
        'g' => 'c'
    );
    $sequence2 = "";
    $checked = false;

    $checked = checkSeqADN($cad);

    for ($i=0; $i < strlen($cad) ; $i++) { 
        if($checked == true){
            $sequence2 .= $nuclComp[$cad[$i]];
        }
    }

    return $sequence2;
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
    <h1>Cadena completentaria</h1>
    <label>Introduce una cadena para recibir su complementaria: </label>
    <input type="text" name="cad" placeholder="e.g: gatagata">
    <input type="submit" name="submit" value="Enviar">
</form>
    
</body>
</html>