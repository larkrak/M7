<?php   


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["faren"]) && empty($_POST['celsius'])) {
        $ret = "Not values found!!";
        
    }else {
        if(!empty($_POST['faren'])){
            $faren = $_POST['faren'];
            $conv = round((($faren - 32) * 5 / 9),2);
        }else{
            if(!empty($_POST['celsius'])){
                $cel = $_POST['celsius'];
                $conv = ($cel / (5/9)) + 32;
            }
        } 
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

<style>

.container{
    width: 25%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding: 10px;
}

.temp{
    display: flex;
    flex-direction: column;
}

.temp input{
    padding: 5px 5px;
    border: none;
    outline: 1px solid lightgrey;
}

.temp span{
    font-size: 15px;
    padding-top: 5px;
}



</style>

<body>





<h1>Temperatura Farenheit a Celsius</h1>

<form action="#" method="post">

<div class="container">
    <div class="temp">
        <input type="text" name="faren" placeholder="Temperatura Fº" value="<?php if(!empty($faren)) echo $faren; if(!empty($cel)) echo $conv; ?>">
        <span>Grados Farenheit</span>
    </div>
    <span>=</span>
    <div class="temp">
        <input type="text" name="celsius" placeholder="Temperatura Cº" value="<?php if(!empty($faren)) echo $conv; if(!empty($cel)) echo $cel ?>";>
        <span>Grados Celsius</span>
    </div>

</div>

<input type="submit" name="submit" value="Enviar">

</form>
    
</body>
</html>