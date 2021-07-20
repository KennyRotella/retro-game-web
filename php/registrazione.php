<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/DbManager.php"; //includes Database Class
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/sessionUtil.php"; //includes session utils
    
	session_start();	
	if(isLogged()){
		header('Location: ./../index.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="it">
<head>
	<title>RetroGames</title>
	<base href="http://localhost/562261_deltufo/index.php">
	<meta charset="utf-8"> 
    <meta name = "author" content = "Massimo Del Tufo">
	<link rel="stylesheet" type="text/css" href="./css/general.css">
	<link rel="stylesheet" type="text/css" href="./css/navbar.css">	
	<link rel="stylesheet" type="text/css" href="./css/box.css">
	<script>
		function validate(){
			var pass1 = document.getElementById("pass");
			var pass2 = document.getElementById("passConfirm");
			if(pass1.value != pass2.value) pass2.setCustomValidity("Le password non coincidiono");
			else pass2.setCustomValidity("");
		}
	</script>	
</head>
<body>
	<?php 
		require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/layout/navbar.php";
	?>
	<div id="box_wrapper">
		<div id="box">
			<form action="./php/processing/regprocess.php" method="post">
				<label>Registrati su RetroGames</label>
				<input autofocus pattern="[a-z0-9]{4,}" title="Utilizza caratteri minuscoli, lunghezza minima 4 caratteri" type="text" maxLength="20" placeholder="Username" name="username" required>
				<input type="email" maxLength="20" placeholder="Email" name="email" required>
				<input pattern="[a-zA-Z0-9]{8,}" title="Solo caratteri alfanumerici, lunghezza minima 8 caratteri" id="pass" type="password" maxLength="20" placeholder="Password" name="password" required>
				<input id="passConfirm" onkeyup="validate()" type="password" maxLength="20" placeholder="Ripeti password" name="confirm" required>
				<div id="button"> <label for="invia">Registrati</label></div>
				<input id="invia" type="submit">
			</form>
			<?php 
				if(isset($_GET['errorMessage'])) echo '<p>'.$_GET['errorMessage'].'</p>';
			?>
		</div>
	</div>
</body>
</html>