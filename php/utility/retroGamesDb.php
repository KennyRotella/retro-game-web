<?php
	require_once "/DbManager.php";

	function getGames(){
		global $database;
		$query = 'SELECT * FROM gioco';
		$result = $database->performQuery($query);
		$database->closeConnection();
		return $result;
	}

	function getBoughtsById($userid){
		global $database;
		$userid = $database->sqlInjectionFilter($userid);
		$query = 'SELECT * FROM acquisto INNER JOIN gioco ON idgioco=gioco WHERE utente='.$userid.'';
		$result = $database->performQuery($query);
		$database->closeConnection();
		return $result;
	}

	function addBought($gameid){
		global $database;
		$gameid = $database->sqlInjectionFilter($gameid);
		$query = 'INSERT INTO acquisto(utente, gioco, data) VALUES ('.$_SESSION['userId'].', '.$gameid.', CURRENT_TIMESTAMP)';
		$database->performQuery($query);
		$database->closeConnection();
	}

	function removeBought($boughtid){
		global $database;
		$query = $database->sqlInjectionFilter($boughtid);
		$query = 'DELETE FROM acquisto WHERE idacquisto='.$boughtid;
		$database->performQuery($query);
		$database->closeConnection();
	}

	function addPayment($boughtid){
		global $database;
		$boughtid = $database->sqlInjectionFilter($boughtid);
		$query = 'UPDATE acquisto SET pagato=1 WHERE idacquisto='.$boughtid;
		$database->performQuery($query);
		$database->closeConnection();
	}

	function addAccount($username, $password, $email){
		global $database;
		$username = $database->sqlInjectionFilter($username);
		$password = $database->sqlInjectionFilter($password);
		$email = $database->sqlInjectionFilter($email);
		$query = 'INSERT INTO utente (username, password, email) VALUES (\''.$username.'\', \''.$password.'\', \''.$email.'\')';
		$database->performQuery($query);
		$database->closeConnection();
	}

	function getAccounts(){
		global $database;
		$query = 'SELECT * FROM utente';
		$result = $database->performQuery($query);
		$database->closeConnection();
		return $result;
	}

	function removeGame($gameid){
		global $database;
		$gameid = $database->sqlInjectionFilter($gameid);
		$query = 'UPDATE gioco SET catalogo=\'0\' WHERE idgioco=\''.$gameid.'\'';
		$database->performQuery($query);
		$database->closeConnection();
	}

	function addBackGame($gameid){
		global $database;
		$gameid = $database->sqlInjectionFilter($gameid);
		$query = 'UPDATE gioco SET catalogo=\'1\' WHERE idgioco=\''.$gameid.'\'';
		$database->performQuery($query);
		$database->closeConnection();
	}

	function addGame($name, $price, $description){
		global $database;
		$name = $database->sqlInjectionFilter($name);
		$price = $database->sqlInjectionFilter($price);
		$description = $database->sqlInjectionFilter($description);
		$query = 'INSERT INTO gioco (nome, prezzo, descrizione) VALUES (\''.$name.'\', \''.$price.'\', \''.$description.'\')';	
		$database->performQuery($query);
		$database->closeConnection();
	}

	function updateGame($gameid, $price, $description){
		global $database;
		$price = $database->sqlInjectionFilter($price);
		$description = $database->sqlInjectionFilter($description);
		$query = 'UPDATE gioco SET prezzo=\''.$price.'\', descrizione=\''.$description.'\' WHERE idgioco=\''.$gameid.'\'' ;	
		$database->performQuery($query);
		$database->closeConnection();
	}
?>