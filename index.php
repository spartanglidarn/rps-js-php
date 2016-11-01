<?php
session_start();
?>

<!DOCTYPE html>
<html lang="sv">

<head>
<meta charset="UTF-8">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<!-- JQuery plus JQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

<!-- Egna CSS och JS filer -->

<link rel="stylesheet" type="text/css" href="style/style.css">

<link rel="stylesheet" type="text/css" href="style/desktop.css">
<link rel="stylesheet" type="text/css" href="style/mobile.css">

<script src="script/weapons/rock.js"></script>
<script src="script/weapons/paper.js"></script>
<script src="script/weapons/scissor.js"></script>
<script src="script/animate.js"></script>
<script src="script/result.js"></script>
<script src="script/weaponClick.js"></script>
<script src="script/script.js"></script>

<title>Gesällprov 2016</title>
</head>
<body>


	<h1>Gesällprov webbutveckling klient 2016</h1>
	<div id="">
		<ul>
			<!-- Menue created frome menuBar.php file -->
			<?php include 'menuBar.php'; ?>		
		</ul>

	</div>
	<div id="container" class="container">

		<div id="weaponsArea" class="blockList">
		<ul>
			<li id="rock" class="weapon"><img src="img/rock.png" alt="Rock"></li>
			<li id="paper" class="weapon"><img src="img/paper.png" alt="Paper"></li>
			<li id="scissor" class="weapon"><img src="img/scissor.png" alt="Scissor"></li>
		</ul>
		</div>
	<div class="clear"></div>
	<div id="resultBlock" class="blockList">

		<div id="playerScreen" class="resultScreen">
			<h2 id="playerResult" class="resultTitle">Player</h2>
			<img id="playerChoice" class="weaponChoice" src="img/fraga.png" alt="Player weapon choice">
			<div class="clear"></div>
				<h2 id="playerWinCount" class="winCountTitle">You have won 0 times</h2>
		</div>
		<div id="computerScreen" class="resultScreen">

			<h2 id="computerResult" class="resultTitle">Computer</h2>
			<img id="computerChoice" class="weaponChoice" src="img/fraga2.png" alt="computer weapon choice">
			<div class="clear"></div>
				<h2 id="computerWinCount" class="winCountTitle">The computer have won 0 times</h2>
		</div>
		
	</div>
	<div class="clear"></div>
	<div id="stats">

		<h3 id="gameCount">0 games played</h3>
		<h3 id="drawCount">0 games ended with draw</h3>
		
	</div>
	<div class="clear"></div>


	<div id="loginForm">
		<h4>Sign in:</h4>
		<form method="POST" action="login/checklogin.php">
			<label>Username: </label><br>
			<input type="text" name="usr"><br>
			<label>Password: </label><br>
			<input type="password" name="pass"><br>
			<input type="submit" name="submit" value="Sign in">
		</form>
	</div>

	<div id="newAccForm">
		<h4>Create new account:</h4>
		<form method="POST" action="login/addusr.php">
			<label>Firstname: </label><br>
			<input type="text" name="firstname"><br>
			<label>Lastname:</label><br>
			<input type="text" name="lastname"><br>
			<label>Email: </label><br>
			<input type="text" name="email"><br>
			<label>Username: </label><br>
			<input type="text" name="username"><br>
			<label>Password: </label><br>
			<input type="password" name="passone"><br>
			<label>Repeat password: </label><br>
			<input type="password" name="passtwo"><br>
			<input type="submit" name="submit" value="Create new account">
		</form>
	</div>

</div>
<footer>Skapad av Erik Boström 2016</footer>
</body>

</html>
