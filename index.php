<!DOCTYPE html>
<html lang="sv">

<head>
<meta charset="UTF-8">
<!-- JQuery plus JQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

<!-- Bootstrap filer -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Slutet av Bootstrap filer -->

<!-- Egna CSS och JS filer -->
<link rel="stylesheet" type="text/css" href="style.css">

<script src="script.js"></script>

<title>Gesällprov 2016</title>
</head>
<body>
<div id="container" class="container">
	<h1>Gesällprov webutveckling klient 2016</h1>

	<!--<canvas id="gameArea"></canvas> Kommenterar ut canvas och använder IMG till att börja med--> 
	<div id="weaponsArea">
		<img id="rock" class="weapon" src="rock.png">
		<img id="paper" class="weapon" src="paper.png">
		<img id="scissor" class="weapon" src="scissor.png">
	</div>
	<div id="playerScreen" class="resultScreen col-md-6">
		<h3>Player</h3>
		<img id="playerChoice">
		<div class="clear"></div>
		<ul class="resultList">
			<li><h4 id="playerResult" class="resultTitle">Player</h4></li>
			<li><h4 id="playerWinCount" class="winCountTitle">You have won 0 times</h4></li>
		</ul>
	</div>
	<div id="computerScreen" class="resultScreen col-md-6">
		<h3>Computer</h3>
		<img id="computerChoice" src="paper.png">
		<div class="clear"></div>
		<ul class="resultList">
			<li><h4 id="computerResult" class="resultTitle">Computer</h4></li>
			<li><h4 id="computerWinCount" class="winCountTitle">The computer have won 0 times</h4></li>
		</ul>
	</div>
	<div class="clear"></div>

<footer>Skapad av Erik Boström 2016</footer>
</div>
</body>

</html>