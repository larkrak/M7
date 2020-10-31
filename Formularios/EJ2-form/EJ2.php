<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI calculator</title>
    <link rel="stylesheet" href="../style/form.css">

</head>
<body>


<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["height"]) || empty($_POST['weight'])) {
        $ret = "Not values found!!";
        
    }else {
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $bmi = $weight / ($height * $height);
    }

}


?>

<h1>Body mass index calculator</h1>

<form action="#" method="post">

    <input type="text" placeholder="Height: e.g, 1.80m" name="height">
    <input type="text" placeholder="Weight: e.g, 80kg " name="weight">
    <input type="submit" name="submit" value="Calculate">

</form>

<div id="imc">
    <h1>IMC: </h1>
    <input type="text" readonly value="<?php if(isset($bmi)) echo $bmi; ?>">
</div>  
</body>
</html>



