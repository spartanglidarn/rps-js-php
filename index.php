<!DOCTYPE html>
<html lang="sv">

<head>
<meta charset="UTF-8">
<!-- JQuery plus JQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

<!-- Egna CSS och JS filer -->

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" type="text/css" href="desktop.css">
<link rel="stylesheet" type="text/css" href="mobile.css">

<script src="weapons/rock.js"></script>
<script src="weapons/paper.js"></script>
<script src="weapons/scissor.js"></script>
<script src="animate.js"></script>
<script src="result.js"></script>
<script src="weaponClick.js"></script>
<script src="script.js"></script>

<title>Gesällprov 2016</title>
</head>
<body>


	<h1>Gesällprov webbutveckling klient 2016</h1>
	<div id="container" class="container">


	<div id="gameArea">
		<div id="weaponsArea" class="blockList">
		<ul>
			<li><img id="rock" class="weapon" src="rock.png"></li>
			<li><img id="paper" class="weapon" src="paper.png"></li>
			<li><img id="scissor" class="weapon" src="scissor.png"></li>
		</ul>
		</div>
	<div class="clear"></div>
	<div id="resultBlock" class="blockList">
		<ul>
		<li><div id="playerScreen" class="resultScreen">
			<h2 id="playerResult" class="resultTitle">Player</h2>
			<img id="playerChoice" class="weaponChoice" src="fraga.png">
			<div class="clear"></div>
				<h4 id="playerWinCount" class="winCountTitle">You have won 0 times</h4>
		</div></li>
		<li><div id="computerScreen" class="resultScreen">

			<h2 id="computerResult" class="resultTitle">Computer</h2>
			<img id="computerChoice" class="weaponChoice" src="fraga2.png">
			<div class="clear"></div>
				<h4 id="computerWinCount" class="winCountTitle">The computer have won 0 times</h4>
		</div></li>
		</ul>
	</div>
		<div class="clear"></div>
		<div id="stats">

			<h4 id="gameCount">0 games have been played</h4>
			<h4 id="drawCount">0 games have ended in a draw</h4>
		
		</div>
		<div class="clear"></div>

</div>
</div>
<footer>Skapad av Erik Boström 2016</footer>
</body>

</html>
