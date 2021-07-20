<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/DbManager.php"; //includes Database Class
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/sessionUtil.php"; //includes session utils
    
	session_start();	
	if(isLogged() !== 'admin'){
		header('Location: ./../login.php');
		exit;
	}
?>
<!DOCTYPE html>
<head>
	<base href="http://localhost/562261_deltufo/index.php">
	<title>RetroGames</title>
	<link rel="stylesheet" type="text/css" href="./css/general.css">
	<link rel="stylesheet" type="text/css" href="./css/navbar.css">	
	<link rel="stylesheet" type="text/css" href="./css/box.css">	
</head>
<body>
	<?php 
		require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/layout/navbar_gestione.php";
	?>
	<div id="box_wrapper">
		<div id="box">
			<form action="./php/gestione/add_gameprocess.php" enctype="multipart/form-data" method="post">
				<label>Aggiungi un gioco su RetroGames</label>
				<input autofocus type="text" maxLength="20" placeholder="Nome" name="nome" required>
				<input type="number" placeholder="Prezzo" name="prezzo" required>
				<textarea maxLength="750" placeholder="Descrizione" name="descrizione" required></textarea>
				<input type="file" title="Copertina" accept="image/*" name="userfile1">
				<input type="file" accept="image/*" name="userfile2">
				<input type="file" accept="image/*" name="userfile3">
				<input type="file" title="Gioco" name="gioco">
				<div id="button"><label for="invia">Aggiungi</label></div>
				<input id="invia" type="submit">
			</form>
			<?php 
				if(isset($_GET['errorMessage'])) echo '<p>'.$_GET['errorMessage'].'</p>';
			?>
		</div>
	</div>
</body>