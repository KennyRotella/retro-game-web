<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/retroGamesDb.php";
	$result = getBoughtsById($_SESSION['userId']);
	if(!$result->num_rows){
		echo '<p id="no_boughts">Non hai nessun gioco nella raccolta!</p>';
	}
?>

<section id="dashboard">
	<ul>
<?php
	while($game = $result->fetch_assoc()){
		echo '<li class="item_wrapper">';
		if($game['pagato']){
			echo '<a href="./download/'.$game["nome"].'.zip" download>';
			echo '<img width="320"  src="./img/'.$game["nome"].'/1.jpg" alt="'.$game["nome"].'">';
			echo '<h2>'.$game["nome"].'</h2>';
			echo '</a>';
		} else {
			echo '<a href="./php/raccolta.php">';
			echo '<img width="320"  src="./img/'.$game["nome"].'/1.jpg" alt="'.$game["nome"].'">';
			echo '<h2>'.$game["nome"].'</h2>';
			echo '<p>'.$game["prezzo"].' Euro</p>';
			echo '</a><br>';
			echo '<a class="pay" href="./php/processing/payprocess.php?idacquisto='.$game["idacquisto"].'"><p>Paga</p></a>';
			echo '<a class="remove" href="./php/processing/removeprocess.php?idacquisto='.$game["idacquisto"].'"><p>Rimuovi</p></a>';
		}
	}
?>
	</ul>
</section>