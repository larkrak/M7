<?php

//age
$age = 9;
//age limits
$minAge = 16;
$maxAge = 67;
//messages
define("MSG_WORK", "you must work");
define("MSG_RETIRED", "you jubilated lol lmaoo");
define("MSG_STUDY", "you have to study");

$messages = array(
    "MSG_WORK" => "you must work!",
    "MSG_RETIRED" => "you jubilated lol lmaoo",
    "MSG_STUDY" => "you have to study"
)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Working age</title>
</head>
<body>

<h2>Working age reporter</h2>

<form action="#" method="post">
    <label>Your age:</label>
    <input type="text" name="age">
    <input type="submit" name="submit" value="Submit">
</form>

<?php

if(isset($_POST['submit'])){

    if(isset($_POST['age'])){

        $age = $_POST['age'];
        
        if($age >= $maxAge){

            $message = $messages["MSG_RETIRED"];
        
        }else{
        
            if($age < $minAge){
                $message = $messages["MSG_STUDY"];
            }else{
                $message = $messages["MSG_WORK"];
            }
        }

        echo "<p>You are $age old and $message</p>";

    }


}


?>


</body>
</html>