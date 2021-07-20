<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/DbManager.php"; //includes Database Class
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/sessionUtil.php"; //includes session utils
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/retroGamesDb.php";
    
	session_start();	
	if(isLogged() !== 'admin'){
		header('Location: ./../login.php');
		exit;
	}

	$idgame = $_GET['idgioco'];

	removeGame($idgame);
	header('Location: ./gestione.php');
	exit;
?>
