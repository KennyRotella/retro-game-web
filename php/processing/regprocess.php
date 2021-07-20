<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/DbManager.php"; //includes Database Class
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/sessionUtil.php"; //includes session utils
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/retroGamesDb.php";
 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = 	$_POST['email'];

	$errorMessage = checkUsername($username, $password);
	if($errorMessage === null){
		addAccount($username, $password, $email);
		header('Location: ./../login.php');
	} else {
		header('Location: ./../registrazione.php?errorMessage='.$errorMessage);
	}

	function checkUsername($username, $password){
		$result = getAccounts();
		if($username === null || $password === null)
			return "Inserisci i dati";
		while($account = $result->fetch_assoc()){
			if($username == $account['username'])
				return "Username esistente"	;
		}
		return null;
	}

	
?>