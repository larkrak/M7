<?php
session_start();

if(isset($_POST['submit'])){
    echo $_SESSION['id'];
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

<?php include 'nav_headers/login.php' ?>

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