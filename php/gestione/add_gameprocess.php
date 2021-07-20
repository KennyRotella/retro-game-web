<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/DbManager.php"; //includes Database Class
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/sessionUtil.php"; //includes session utils
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/retroGamesDb.php";
 
 	session_start();	
	if(isLogged() !== 'admin'){
		header('Location: ./../login.php');
		exit;
	}
	
	$idgioco;
	$nome = $_POST['nome'];
	$prezzo = $_POST['prezzo'];
	$descrizione = 	$_POST['descrizione'];

	$errorMessage = checkNome($nome);
	if($errorMessage === "Inserisci il nome"){
		header('Location: ./addGame.php?errorMessage='.$errorMessage);
		exit;
	}

	$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/562261_deltufo/img/'.$nome;
	mkdir($uploaddir);
	for($i=1; $i<=3; $i++){
		move_uploaded_file($_FILES['userfile'.$i]['tmp_name'], $uploaddir.'/'.$i.'.jpg');
	}
	move_uploaded_file($_FILES['gioco']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/562261_deltufo/download/'.$nome.'.txt');

	if($errorMessage === "Gioco esistente") {
		updateGame($idgioco, $prezzo, $descrizione);
		header('Location: ./gestione.php');
		exit;
	} else {
		addGame($nome, $prezzo, $descrizione);
		header('Location: ./gestione.php');
		exit;
	}

	function checkNome($nome){
		$result = getGames();
		if($nome == null)
			return "Inserisci il nome";
		while($gioco = $result->fetch_assoc()){
			if($nome == $gioco['nome']){
				global $idgioco;
				$idgioco = $gioco['idgioco'];
				return "Gioco esistente";
			}
		}
		return null;
	}

	
?>