<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>    <title>Document</title>
    <title>Document</title>
    <link rel="stylesheet" href="../style/form.css">

</head>

<script type="text/javascript">

$(document).ready(function(){

    $("select").change(function(){

        opt = $("select option:selected").text();

        string = opt.substr(5)

        s = []
        contA = 0;
        contC = 0;
        contT = 0;
        contG = 0;

        for(i = 0;i < string.length; i++){
            s[i] = string.charAt(i);
        }

        for(i = 0; i < s.length; i++){

            switch (s[i]) {
                case 'a':
                    contA += 1;
                    break;
                case 'c':
                    contC += 1;
                    break;
                case 't':
                    contT += 1;
                    break;
                case 'g':
                    contG += 1;
                    break;
            }
            
            pA = (contA / (s.length) ) * 100;
            pC = (contC / (s.length) ) * 100;
            pT = (contT / (s.length) ) * 100;
            pG = (contG / (s.length) ) * 100;

            $("#res p").text("A -> " +contA+ " times and "+pA+"%,"+
            
            "C -> " +contC+ " times and "+pC+"%,T -> " +contT+ " times and "+pT+"%,"+
            "G -> " +contG+ " times and "+pG+"%");

        }
    })

});
</script>

<?php

include '../FuncionesUtiles/funciones.php';

if(isset($_POST['submit'])){

    $option = isset($_POST['select']) ? $_POST['select'] : false;
    $contA = 0;
    $contC = 0;
    $contT = 0;
    $contG = 0;
    $contU = 0;

    switch ($option) {
        case 'adn':

            $cad = $_POST['cad'];

            $checked = checkSeqADN($cad);

            if($checked == true){
                $cad = str_split($cad);

                for($i = 0; $i < count($cad); $i++){

                    switch ($cad[$i]) {
                        case 'a':
                            $contA += 1;
                            break;
                        case 'c':
                            $contC += 1;
                            break;
                        case 't':
                            $contT += 1;
                            break;
                        case 'g':
                            $contG += 1;
                            break;
                    }
                    
                    $pA = round(($contA / (count($cad)))  * 100);
                    $pC = round(($contC / (count($cad)) ) * 100);
                    $pT = round(($contT / (count($cad)) ) * 100);
                    $pG = round(($contG / (count($cad)) ) * 100);
           
                }
                echo "<h3>A -> [" .$contA. "] times and ".$pA."%,C -> [" .$contC. "] times and ".$pC."%,T -> [" .$contT. "] times and ".$pT."%,G -> [" .$contG. "] times and ".$pG."%</h3>";
        

            }
            else{
                echo "<h1>invalid sequence</h1>";
            }

            break;
        case 'arn':
            $cad = $_POST['cad'];

            $checked = checkSeqARN($cad);

            if($checked == true){
                $cad = str_split($cad);

                for($i = 0; $i < count($cad); $i++){

                    switch ($cad[$i]) {
                        case 'a':
                            $contA += 1;
                            break;
                        case 'c':
                            $contC += 1;
                            break;
                        case 't':
                            $contT += 1;
                            break;
                        case 'u':
                            $contU += 1;
                            break;
                    }
                    
                    $pA = round(($contA / (count($cad)))  * 100);
                    $pC = round(($contC / (count($cad)) ) * 100);
                    $pT = round(($contT / (count($cad)) ) * 100);
                    $pU = round(($contU / (count($cad)) ) * 100);
           
                }
                echo "<h3>A -> [" .$contA. "] times and ".$pA."%,C -> [" .$contC. "] times and ".$pC."%,T -> [" .$contT. "] times and ".$pT."%,U -> [" .$contU. "] times and ".$pU."%</h3>";
        
            }
            else{
                echo "<h1>invalid sequence</h1>";
            }
            break;
        default:
            break;
    }
}

?>

<body>



<form action="#" method="post">
<h2>Numero de nucleotidos</h2>
<select name="select">
    <!-- <option>Selecciona una:</option> -->
    <option value="adn">ADN</option>
    <option value="arn">ARN</option>
</select>
<input type="text" name="cad" placeholder="e.g: acgtacgtgactgatg ">
    <input type="submit" name="submit" value="Enviar">
</form>
    
</body>


</html>