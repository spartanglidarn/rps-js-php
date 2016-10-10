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

		<div id="weaponsArea" class="blockList">
		<ul>
			<li><img id="rock" class="weapon" src="img/rock.png"></li>
			<li><img id="paper" class="weapon" src="img/paper.png"></li>
			<li><img id="scissor" class="weapon" src="img/scissor.png"></li>
		</ul>
		</div>
	<div class="clear"></div>
	<div id="resultBlock" class="blockList">

		<div id="playerScreen" class="resultScreen">
			<h2 id="playerResult" class="resultTitle">Player</h2>
			<img id="playerChoice" class="weaponChoice" src="img/fraga.png">
			<div class="clear"></div>
				<h2 id="playerWinCount" class="winCountTitle">You have won 0 times</h2>
		</div>
		<div id="computerScreen" class="resultScreen">

			<h2 id="computerResult" class="resultTitle">Computer</h2>
			<img id="computerChoice" class="weaponChoice" src="img/fraga2.png">
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


</div>
<footer>Skapad av Erik Boström 2016</footer>
</body>

</html>
