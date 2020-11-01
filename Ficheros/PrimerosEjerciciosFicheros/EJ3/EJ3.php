<?php


if(isset($_POST['submit'])){

     // Count total files
    $countfiles = count($_FILES['file']['name']);
    
    // Looping all files
    for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES['file']['name'][$i];
    
    if(dir("upload")){
        move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);
    }else{
        mkdir("upload");
        move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);
    }
    echo "<h1>Archivo subido: ".$_FILES['file']['name'][$i]."</h1>";
    }


}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    
</head>
<body>

<form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "file[]" multiple />
         <?php 
            if(isset($_POST['submit'])){
                echo '<select>';
                for($i=0;$i<count($_FILES['file']['name']);$i++){
                    echo '<option>' .$_FILES['file']['name'][$i]. '</option>';
                    //echo $_FILES['file']['name'][$i]; 
                }
                echo '</select>';
            }
         
         ?>
         <input type = "submit" name="submit"/>
</form>    
</body>
</html>