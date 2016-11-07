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
<script src="script/gameType.js"></script>
<script src="script/resetGame.js"></script>
<script src="script/script.js"></script>

<!-- load high charts -->
<script src="http://code.highcharts.com/highcharts.js"></script>

<title>Gesällprov 2016</title>
</head>
<body>

	<h1 id="siteTitle"><a href="http://localhost:8080/rps-js-php-2.0/rps-js-php/">Gesällprov webbutveckling klient 2016</a></h1>

		<ul>
			<!-- Menue created frome menuBar.php file -->
			<?php include 'menuBar.php'; ?>		
		</ul>

	<div id="container" class="container">		