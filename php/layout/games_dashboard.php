<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/retroGamesDb.php";
	$result = getGames();
?>

<section id="dashboard">
	<ul>
<?php
	while($game = $result->fetch_assoc()){
		if(!$game['catalogo']) continue;
		echo '<li class="item_wrapper">';
		echo '<a href="./php/game.php?idgioco='.$game["idgioco"].'">';
		echo '<img width="320"  src="./img/'.$game["nome"].'/1.jpg" alt="'.$game["nome"].'">';
		echo '<h2>'.$game["nome"].'</h2>';
		echo '<p>'.$game["prezzo"].' Euro</p>';
		echo '</a>';
	}
?>
	</ul>
</section>