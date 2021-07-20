<nav id="navbar">
<h2>RetroGames</h2>
<?php 	
	if(!isLogged()){
		echo '<a href="./php/login.php">Login</a>';
		echo '<a href="./php/registrazione.php">Registrazione</a>';
	} else {
		echo '<p>Bentornato '.$_SESSION['username'].'!</p>';
		echo '<a href="./php/logout.php">Logout</a>';
	}
?>
	<a href="#">Catalogo</a>
	<a href="./php/raccolta.php">Raccolta</a>
</nav>