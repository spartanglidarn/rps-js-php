<?php
include'header.php';
include 'login/dbconn.php'; 

$stmt = $conn -> prepare('SELECT playerMoves, computerMoves, resultList FROM stats WHERE userId = ? ORDER BY gameId');
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

$playerMovesArray = array();
$computerMovesArray = array();
$resultListArray = array();

//count how many times a weapon is used
$playerWeaponCount = 0;
$playerRockCount = 0;
$playerPaperCount = 0;
$playerScissorCount = 0;

$computerWeaponCount = 0;
$computerRockCount = 0;
$computerPaperCount = 0;
$computerScissorCount = 0;

//count the number of rounds and games. 
$playerWinRoundCount = 0; 
$computerWinRoundCount = 0;
$drawRoundCount = 0;
$roundCount = 0; 

//count the number of games polyed and results
$playerWinCount = 0; 
$computerWinCount = 0;
$drawCount = 0;
$gameCount = 0;

while ($stmt -> fetch()){
	/*$playerMovesArray -> append ( array ( explode ( ',' , $playerMoves ) ) );
	$computerMovesArray -> append ( array ( explode ( ',' , $computerMoves) ) );
	$resultListArray -> append ( array ( explode ( ',' , $resultList) ) );*/
	array_push($playerMovesArray, explode (',' , $playerMoves));
	array_push($computerMovesArray, explode (',' , $computerMoves));
	array_push($resultListArray, explode (',' , $resultList));

}

//handels the player moves lists.
//first foreach represents the row.
foreach ($playerMovesArray as $key => $value) {

	//represents the array that is on the row.
	foreach ($value as $key => $value) {
		
		$playerWeaponCount ++;
		if ($value == "rock"){
			$playerRockCount ++;
		} elseif ($value == "paper"){
			$playerPaperCount ++;
		} elseif ($value == "scissor") {
			$playerScissorCount ++;
		} else {
			echo "Error! wrong weapon in array database!!!!";
		}

	}
}

//handels the computer moves list
//first foreach represents the row.
foreach ($computerMovesArray as $key => $value) {

	//represents the array that is on the row.
	foreach ($value as $key => $value) {
		
		//print_r($key . $value);
		//echo "<br>";

		$computerWeaponCount ++;
		if ($value == "rock"){
			$computerRockCount ++;
		} elseif ($value == "paper"){
			$computerPaperCount ++;
		} elseif ($value == "scissor") {
			$computerScissorCount ++;
		} else {
			echo "Error! wrong weapon in array database!!!!";
		}

	}
}

//Handels the result list.
//first foreach represents the row.
foreach ($resultListArray as $key => $value) {

	$tempWinCount = 0;
	$tempLoseCount = 0;
	$tempDrawCount = 0;
	//represents the array that is on the row.
	foreach ($value as $key => $value) {
		//count rounds results
		if ($value == "Win") {
			$tempWinCount ++;
		} elseif ($value == "Lose") {
			$tempLoseCount ++;
		} elseif ($value == "Draw") {
			$tempDrawCount ++;
		}
		$roundCount ++;
	}

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

//Weapon procent for player
$playerRockProcent = $playerRockCount / $playerWeaponCount;
$playerPaperProcent = $playerPaperCount / $playerWeaponCount;
$playerScissorProcent = $playerScissorCount / $playerWeaponCount;

//Weapon procent for computer
$computerRockProcent = $computerRockCount / $computerWeaponCount;
$computerPaperProcent = $computerPaperCount / $computerWeaponCount;
$computerScissorProcent = $computerScissorCount / $computerWeaponCount;


//Win procent
$playerWinProcent = round(($playerWinCount / $gameCount) * 100 , 2);
$playerRoundWinProcent = round($playerWinRoundCount / $roundCount * 100,2);

//lose procent
$computerWinProcent = round(($computerWinCount / $gameCount) * 100 , 2);
$computerRoundWinProcent = round($computerWinRoundCount / $roundCount * 100, 2);

// Draw procent 
$drawProcent = round(($drawCount / $gameCount) * 100 , 2);
$drawRoundProcent = round($drawRoundCount / $roundCount * 100, 2);


?>