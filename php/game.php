<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/DbManager.php"; //includes Database Class
    require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/sessionUtil.php"; //includes session utils
	require_once $_SERVER['DOCUMENT_ROOT']."/562261_deltufo/php/utility/retroGamesDb.php";

	session_start();
	$idgame = $_GET['idgioco'];
	$result = getGames();
	while($row = $result->fetch_assoc()){
		if($row['idgioco']==$idgame) break;
	}
?>
<!DOCTYPE html>
<html lang="it">
<head>
	<title><?php echo $row['nome']; ?></title>	
	<base href="http://localhost/562261_deltufo/index.php">
	<meta charset="utf-8"> 
    <meta name = "author" content = "Massimo Del Tufo">
	<link rel="stylesheet" href="./css/general.css">
	<link rel="stylesheet" href="./css/navbar.css">
	<link rel="stylesheet" href="./css/imagecontainer.css">
	<link rel="stylesheet" href="./css/buytrybuttons.css">
	<script>
		function displayGame(){
			var iframe = document.getElementById('demo_wrapper');
			iframe.style = "display: block"
		}

		window.onclick = function(evt){
			var iframe = document.getElementById('demo_wrapper');
			if(evt.target==iframe) iframe.style = "display: none";
		}
	</script>
</head>
<body>
<?php
	require_once "./layout/navbar.php";
?>
	<div id="content">
		<header>
			<h1 class="game_title"><?php echo $row['nome']; ?></h1>
		</header>
		<div class="image-container noselect">
			<span id="leftarr"></span>
			<span id="rightarr"></span>
			<input type="radio" id="i1" name="images" checked/>
			<input type="radio" id="i2" name="images" />
			<input type="radio" id="i3" name="images" />

			<?php echo '<img class="img" id="one" src="./img/'.$row['nome'].'/1.jpg" alt="slide1">'; ?>
			<label class="pre" id="pre1" for="i3"></label>
			<label class="nxt" id="nxt1" for="i2"></label>

			<?php echo '<img class="img" id="two" src="./img/'.$row['nome'].'/2.jpg" alt="slide2">'; ?>
			<label class="pre" id="pre2" for="i1"></label>
			<label class="nxt" id="nxt2" for="i3"></label>

			<?php echo '<img class="img" id="three" src="./img/'.$row['nome'].'/3.jpg" alt="slide3">'; ?>
			<label class="pre" id="pre3" for="i2"></label>
			<label class="nxt" id="nxt3" for="i1"></label>

			<div class="dots_nav">
				<label class="dots" id="dot1" for="i1"></label>
				<label class="dots" id="dot2" for="i2"></label>
				<label class="dots" id="dot3" for="i3"></label>
			</div>
		</div>

		<section id='description'>
			<h2>Descrizione del gioco</h2>
			<?php echo '<p>'.htmlentities($row['descrizione'], ENT_COMPAT, 'ISO8859-1').'</p>' ?>
		</section>

		<div id="buttons" class="noselect">
			<input id="buy" type="button" value="compra">
			<?php 
			echo '<label class="buy" for="buy"><a href="./php/processing/buyprocess.php?idgioco='.$row['idgioco'].'">ACQUISTA</a></label>';
			echo '<p id="prezzo">'.$row['prezzo'].' Euro</p>'; 
			?>

			<input id="try" type="button" value="prova" onclick="displayGame()">
			<?php if($row['demo']){ ?>
			<label class="try" for="try"><a>PROVA</a></label>
			<?php } else { ?>
			<label class="try disabled"><a>PROVA</a></label>
			<?php } ?>
		</div>
	</div>

	<?php if($row['demo']){?>
	<div id="demo_wrapper">
	  	<div id="pop">
	    <?php echo '<iframe id="game" src="./js/'.$row['nome'].'/demo.html">'; ?>
	  	</iframe>
		</div>
	</div>
	<?php }?>

</body>
</html>