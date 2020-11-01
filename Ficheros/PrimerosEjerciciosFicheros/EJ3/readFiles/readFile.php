<?php

if(isset($_POST['submitFile'])){
    
    if($_POST['selectedFile']){
        $opt = $_POST['selectedFile'];

        if($opt != 'opt0'){

            $opt = explode(":", $opt);
            
            $file = $opt[1];

            $filepath = ("../upload/"  . $file);

            $archivo = fopen($filepath, "r");

            if(!$archivo){
                echo '<h1>No such file or directory!!</h1>';
            }else{

                if(file_get_contents($filepath)){
                    $content = file_get_contents($filepath);
                    echo '<h1>Content for:</h1>';
                    echo '<h1>'.$filepath.'</h1>';
                    echo '<textarea>'.$content.'</textarea>';
                }
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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
</body>
</html>