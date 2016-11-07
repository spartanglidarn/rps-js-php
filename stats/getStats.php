<?php
//hämtar statistik från databasen.
include'header.php';
include 'login/dbconn.php'; 

//sätter upp sql frågan till databasen.
$stmt = $conn -> prepare('SELECT playerMoves, computerMoves, resultList FROM stats WHERE userId = ? ORDER BY gameId');
//kollar efter felmeddelande vid koppling till databas
if ($stmt === false) {
	die ('prepare failed: ' . htmlspecialchars($mysqli->error));
}

$bp = $stmt -> bind_param('i', $_SESSION['userId']);
if ($bp === false) {
	die ('bind parameters failed: ' . htmlspecialchars($mysqli->error));
}

$stmtexe = $stmt -> execute();
if ($stmtexe === false) {
	die ('execution statement failed: ' . htmlspecialchars($mysqli->error));
}

$stmtbind = $stmt->bind_result($playerMoves, $computerMoves, $resultList);
if ($stmtbind === false) {
	die ('binding of results failed: ' . htmlspecialchars($mysqli->error));
}

//skapar arrayer för varje statistik kollumn i databasen.
$playerMovesArray = array();
$computerMovesArray = array();
$resultListArray = array();

//räknar hur många gånger användaren och datorn har använt varje vapen. 
$playerWeaponCount = 0;
$playerRockCount = 0;
$playerPaperCount = 0;
$playerScissorCount = 0;

$computerWeaponCount = 0;
$computerRockCount = 0;
$computerPaperCount = 0;
$computerScissorCount = 0;

//räknar hur många ronder och spel som användaren och datorn har spelat.
$playerWinRoundCount = 0; 
$computerWinRoundCount = 0;
$drawRoundCount = 0;
$roundCount = 0; 

$playerWinCount = 0; 
$computerWinCount = 0;
$drawCount = 0;
$gameCount = 0;

// hämtar varje rad i databasen och lägger in respektive kollumns data i respektive array.
while ($stmt -> fetch()){
	array_push($playerMovesArray, explode (',' , $playerMoves));
	array_push($computerMovesArray, explode (',' , $computerMoves));
	array_push($resultListArray, explode (',' , $resultList));

}

//hanterar användarens lista med drag
//första foreach loopen representerar databas raden.
foreach ($playerMovesArray as $key => $value) {

	//andra foreach loopen representerar varje värde som ligger på en rad.
	foreach ($value as $key => $value) {
		
		$playerWeaponCount ++;

		switch($value){
			case "rock":
				$playerRockCount ++;
				break;
			case "paper":
				$playerPaperCount ++;
				break;
			case "scissor":
				$playerScissorCount ++;
				break;
			default: 
				die ('wrong player weapon in database');		
		};

	};
};

//hanterar datorns lista med drag
//första foreach loopen representerar databas raden.
foreach ($computerMovesArray as $key => $value) {

	//andra foreach loopen representerar varje värde som ligger på en rad.
	foreach ($value as $key => $value) {

		$computerWeaponCount ++;

		switch ($value) {
			case "rock":
				$computerRockCount ++;
				break;
			case "paper":
				$computerPaperCount ++;
				break;
			case "scissor":
				$computerScissorCount ++;
				break;
			default:
				die ('wrong computer weapon in database');	
				break;
		};
	};
};

//hanterar listan med användarens vinster och förluster.
//första foreach loopen representerar databas raden.
foreach ($resultListArray as $key => $value) {

	//skapar ett temporärt värde på varje rad som sedan slås ihop för att få ut rond statistik.
	$tempWinCount = 0;
	$tempLoseCount = 0;
	$tempDrawCount = 0;
	//andra foreach loopen representerar varje värde som ligger på en rad.
	foreach ($value as $key => $value) {

		switch ($value) {
			case "Win":
				$tempWinCount ++;
				break;
			case "Lose":
				$tempLoseCount ++;
				break;
			case "Draw":
				$tempDrawCount ++;
				break;
			default:
				die ('wrong result in database');

		};

		$roundCount ++;
	};
	//räknar hur många gånger användare har vunnit, förlorat och spelat lika en hel match.
	if ($tempWinCount > $tempLoseCount) {
		$playerWinCount ++;
	} elseif ($tempLoseCount > $tempWinCount) {
		$computerWinCount ++;
	} elseif ($tempLoseCount == $tempWinCount) {
		$drawCount ++;
	}

	$playerWinRoundCount += $tempWinCount; 
	$computerWinRoundCount += $tempLoseCount;
	$drawRoundCount += $tempDrawCount;

	$gameCount ++;
}

//räknar ut den hur stor andel i procent som användaren och datorn har valt ett visst vapen
$playerRockProcent = $playerRockCount / $playerWeaponCount;
$playerPaperProcent = $playerPaperCount / $playerWeaponCount;
$playerScissorProcent = $playerScissorCount / $playerWeaponCount;

$computerRockProcent = $computerRockCount / $computerWeaponCount;
$computerPaperProcent = $computerPaperCount / $computerWeaponCount;
$computerScissorProcent = $computerScissorCount / $computerWeaponCount;

//räknar ut vinst procent
$playerWinProcent = round(($playerWinCount / $gameCount) * 100 , 2);
$playerRoundWinProcent = round($playerWinRoundCount / $roundCount * 100,2);

//räknar ut förlust procent
$computerWinProcent = round(($computerWinCount / $gameCount) * 100 , 2);
$computerRoundWinProcent = round($computerWinRoundCount / $roundCount * 100, 2);

//räknar ut hur stor procent andel det blivit lika 
$drawProcent = round(($drawCount / $gameCount) * 100 , 2);
$drawRoundProcent = round($drawRoundCount / $roundCount * 100, 2);


?>