<?php

$logged = false;
$user = false;
$pass_not = false;
$user_not;
$user_req = false;
$pass_req = false;
$_SESSION['user_valid'] = false;

var_dump($_SESSION);

//LOGIN

if(isset($_POST['submitL'])){
    session_start();
    if (session_id()){

        if ( (filter_has_var(INPUT_POST, 'user')) && (filter_has_var(INPUT_POST, 'pass')) ) {

            $user_input = (trim($_POST['user']));  
            $pass_input = (trim($_POST['pass']));

            if ( (strlen($user_input)==0) || (strlen($pass_input)==0) ) {  

                if((strlen($user_input)==0)){
                    $user_req = true;
                }
                if((strlen($pass_input)==0)){
                    $pass_req = true;
                }

                $logged = false;
                                    
            }else {

                //Readin the FILE
                $cadena = file("./login_files/users.txt");

                for ($i=0; $i < (count($cadena)); $i++) { 

                    $checkUser = $cadena[$i];
                    
                    $checkUser = explode(";", $checkUser);

                    if(($checkUser[0] === $user_input) && ($checkUser[1] === $pass_input)){

                        $_SESSION['user'] = $user_input;
                        $_SESSION['pass'] = $pass_input;
                        $_SESSION['role'] = $checkUser[2];
                        $_SESSION['user_valid'] = true;
                        $_SESSION['id'] = session_id();
                        $logged = true;
                        
                    }
                }
            }
        } 
    }
}

//REGISTER

if(isset($_POST['submitR'])){
    session_start();
    if (session_id()){

        if ((filter_has_var(INPUT_POST, 'name')) && (filter_has_var(INPUT_POST, 'surname')) && (filter_has_var(INPUT_POST, 'user')) && (filter_has_var(INPUT_POST, 'pass')) && (filter_has_var(INPUT_POST, 'confirm_pass'))){
            $name_input = (trim($_POST['name']));  
            $surname_input = (trim($_POST['surname']));
            $user_input = (trim($_POST['user']));
            $pass_input = (trim($_POST['pass']));
            $confirm_pass = (trim($_POST['confirm_pass']));

            if(isset($_SESSION)){
                
            }

            if($_SESSION['user_valid'] == true){
                echo "puta";
            }else{
                echo "no valid";
            }
            //var_dump($_POST);
        }

    }



}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"> 
    <title>Sunset Burguer</title>
</head>
<body>

<div>

<?php include 'nav_headers/loginregister.php' ?>

    <div class="bg-image grayscale blur"></div>

    <div class="bg-text">
      <h1>Sunset burguer</h1>
      <p>¡Be a real fooder!</p>
    </div> 

    <div class="opinions">
        <h2>Opinions</h2>
        <div>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half"></i>
        </div>
        <h3>288 comentaries</h3>

        <div class="trip_opinions">
            <div>
                <div class="grid_stars_date">   
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <div>
                        <p>2/11/2020</p>
                    </div>
                </div>
                <div class="user_opinion">
                    <p>Marc</p>
                    <p>Las mejores hamburguesas que he probado nunca</p>
                </div>

            </div>
            <div>
                <div class="grid_stars_date">   
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <div>
                        <p>2/11/2020</p>
                    </div>
                </div>
                <div class="user_opinion">
                    <p>Marc</p>
                    <p>Las mejores hamburguesas que he probado nunca</p>
                </div>
            </div>
            <div>
                <div class="grid_stars_date">   
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <div>
                        <p>2/11/2020</p>
                    </div>
                </div>
                <div class="user_opinion">
                    <p>Marc</p>
                    <p>Las mejores hamburguesas que he probado nunca</p>
                </div>
            </div>
            <div>
                <div class="grid_stars_date">   
                    <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <div>
                        <p>2/11/2020</p>
                    </div>
                </div>
                <div class="user_opinion">
                    <p>Marc</p>
                    <p>Las mejores hamburguesas que he probado nunca</p>
                </div>
            </div>
        </div>
    </div>
    <?php include 'nav_headers/footer.php' ?> 
</body>
</html>