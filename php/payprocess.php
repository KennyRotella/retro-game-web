<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/DbManager.php"; //includes Database Class
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/sessionUtil.php"; //includes session utils
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/retroGamesDb.php";
    
	session_start();	
	if(!isLogged()){
		header('Location: ./login.php');
		exit;
	}

	$idbought = $_GET['idacquisto'];

	addPayment($idbought);
	header('Location: ./raccolta.php');
	exit;
?>
