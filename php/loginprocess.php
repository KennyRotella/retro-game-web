<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/DbManager.php"; //includes Database Class
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/sessionUtil.php"; //includes session utils
 
	$username = $_POST['username'];
	$password = $_POST['password'];

	$errorMessage = login($username, $password);
	if($errorMessage === null)
		if($_SESSION['username'] === 'admin') header('location: ./gestione/gestione.php');
		else header('location: ./../index.php');
	else
		header('location: ./login.php?errorMessage=' . $errorMessage );


	function login($username, $password){   
		if ($username != null && $password != null){
			$result = authenticate($username, $password);
			if ($result == -1)
				return 'Username e/o password non validi.';
    		if (mysqli_num_rows($result) == 1){
    			session_start();
    			$userRow = $result->fetch_assoc();
    			setSession($userRow['username'], $userRow['idutente']);
    			return null;
    		}
    	}
    	return 'Username e/o password non validi.';
	}
	
	function authenticate ($username, $password){   
		global $database;
		$username = $database->sqlInjectionFilter($username);
		$password = $database->sqlInjectionFilter($password);

		$queryText = "select * from utente where username='" . $username . "' AND password='" . $password . "'";

		$result = $database->performQuery($queryText);
		$numRow = mysqli_num_rows($result);
		if ($numRow != 1)
			return -1;
		
		$database->closeConnection();

		return $result;
	}
?>