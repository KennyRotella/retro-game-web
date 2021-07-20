<?php
	
	//setSession: set $_SESSION properly
	function setSession($username, $userId){
		$_SESSION['userId'] = $userId;
		$_SESSION['username'] = $username;
	}

	//isLogged: check if user has logged in and if true returns the user id
	function isLogged(){		
		if(isset($_SESSION['userId']))
			return $_SESSION['username'];
		else
			return false;
	}

?>