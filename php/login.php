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
</head>
<body>
	<?php 
		require_once "./layout/navbar.php";
	?>
	<div id="box_wrapper">
		<div id="box">
			<form action="./php/processing/loginprocess.php" method="post">
				<label>Accedi su RetroGames</label>
				<input autofocus type="text" placeholder="Username" name="username" required>
				<input type="password" placeholder="Password" name="password" required>
				<div id="button"> <label for="invia">Accedi</label></div>
				<input id="invia" type="submit">
			</form>
			<?php 
				if(isset($_GET['errorMessage'])) echo '<p>'.$_GET['errorMessage'].'</p>';
			?>
		</div>
	</div>
</body>
</html>