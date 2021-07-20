<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/DbManager.php"; //includes Database Class
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/sessionUtil.php"; //includes session utils
    
	session_start();	
	if(!isLogged()){
		header('Location: ./login.php');
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
</head>
<body>
	<?php 
		require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/layout/navbar.php"; 
		require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/layout/raccolta_dashboard.php"; 
	?>
</body>
</html>