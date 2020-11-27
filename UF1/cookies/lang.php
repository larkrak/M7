
<?php
 $user = "";
 $password = "";
 $language = "";
 $idiomaCookie= "";
 
 if (filter_has_var(INPUT_POST,'submit') ) {
    $user = filter_input(INPUT_POST,'user');
    $password = filter_input(INPUT_POST,'password');
    $language = filter_input(INPUT_POST,'language');
 
    if(isset($language)) {
      setcookie('idioma',$language );
      //expires 10 dias, tot el domini, httpOnly
      $expires =  time()+(60*60*24+10);
      setcookie("idioma2", $language, $expires , "/", "", false, true);
    }
 }
 
?>
 
<!DOCTYPE html>
<html lang="en">
	<head>
	   <meta charset="UTF-8">
	   <title>Cookie</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
	</head>
	<body>
		<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			<fieldset>
				<legend>Login</legend>
				<label for="user">User:</label>
				<input type="user" id="user" name="user" value="<?=$user?>" />
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" value="<?=$password?>" />
				<label for="language">Language:</label>
				<input type="language" id="language" name="language" value="<?=filter_input(INPUT_COOKIE,'idioma')?>" />
				<input type="submit" name="submit" value="LOGIN" />
			</fieldset>
		</form>	
	</body>
</html>