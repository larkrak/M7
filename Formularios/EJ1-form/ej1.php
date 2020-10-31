<?php

function printTable($n){


/*echo "<table style='width:80%;margin:auto;padding:10px'>";
        
        for ($r =0; $r < 10; $r++){
            echo '<th style="background-color:grey"> Tabla del '.$r.' </th>';
            echo'<tr>';
            
            for ($c = 0; $c < 10; $c++)
            
            echo '<td style="background-color:lightgrey;padding:5px">'.$r.' X '.$c.' = '.$c*$r.'</td>';
                
           echo '</tr>'; 

        }

  echo "</table>";
  */

/*
echo '
  <table>
    <thead>
        <tr>
            <th>&nbsp;</th>';
            for($i=0; $i<$n; $i++) {
                echo '<th style="background-color:lightgrey;padding:10px;border:1px solid black">'.$i.'</th>';
            };
        echo '</tr>
    </thead>
    <tbody>';
        for($i=0; $i<$n; $i++) {
        echo '<tr>
            <td style="background-color:lightgrey;padding:10px;border:1px solid black">'; echo $i .'</td>';
            for($j=0; $j<$n; $j++) {
                echo '<td style="background-color:lightblue;padding:10px;text-align:center">'.$i*$j.'</td>';
                }
        echo '</tr>';
        }
    echo '</tbody>
</table>';*/
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

<?php
//echo printTable(2);



?>

<form action="#" method="post">
   <p>Table:  <input type="text" name="num" maxlength="2" size="2" /></p>
   <p><input type="submit" value="Submit" /></p>
</form>
<?php  


if(isset($_POST['num'])){
    $n=$_POST['num'];
    if ($n<1 or $n>10) {
        echo "no has escrito un nųmero entre el 1 y el 10.";
        }
    else {
         echo "<h4>Mutiplication table of $n:</h4>";
         $i=1;
         while ($i<=10) {
               echo "$n x $i = ".$n*$i."<br/>";
               $i++;
               } 
         }
}


?>
</body>
</html>
