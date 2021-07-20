<nav id="navbar">
<h2>RetroGames</h2>
<?php 	
	echo '<p>Bentornato '.$_SESSION['username'].'!</p>';
	echo '<a href="./php/logout.php">Logout</a>';
?>
	<a href="./php/gestione/addGame.php">Aggiungi/Modifica</a>
	<a href="./php/gestione/removedGame.php">Rimossi</a>
	<a href="./php/gestione/gestione.php">Catalogo</a>
</nav>