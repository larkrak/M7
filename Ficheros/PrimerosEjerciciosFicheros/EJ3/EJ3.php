
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    
</head>
<body>

<?php if(!isset($_POST['submit'])){

echo <<< EOL

        <form action = "" method = "POST" enctype = "multipart/form-data">
        <input type = "file" name = "file[]" multiple />
        <input type = "submit" name="submit"/>
        </form>
EOL;

    }else{

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

            if(!$_FILES['file']['tmp_name'][$i]) {
                echo '<h1>No file found</h1>';
            }else{
                echo "<h1>Archivo subido: ".$_FILES['file']['name'][$i]."</h1>";
            }

            
        }


    
echo <<< EOL

        <form action="readFiles/readFile.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" multiple />
            <select name="selectedFile">
                <option value="opt0">Select a file to read</option>
EOL;
        for($i=0;$i<count($_FILES['file']['name']);$i++){
            echo '<option value="'.($i+1).':'.$_FILES['file']['name'][$i].'">' .$_FILES['file']['name'][$i]. '</option>';
            //echo $_FILES['file']['name'][$i]; 
            
        }
echo <<< EOL
            </select>
        <input type="submit" name="submitFile"/>
        </form>
EOL;

        
    }
?>

</form>    
</body>
</html>