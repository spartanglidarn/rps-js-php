<?php
//skickar statistik till databasen
session_start();
include '../login/dbconn.php';
$timeStamp = date('Y-m-d H:i:s');

//sätter upp sql frågan till databasen.
$stmt = $conn->prepare('INSERT INTO stats (playerMoves, computerMoves, resultList, userId, reg_date)
						VALUES (?, ?, ?, ?, ?)');
//kollar efter felmeddelande i $stmt
if ( false===$stmt ) {
	  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}

//sätter ihop alla arrayer som håller data till strings för att sparas i mysql databas.
$resultList = implode("," , $_POST['resultList']);
$playerMoves = implode("," , $_POST['playerMoves']);
$computerMoves = implode("," , $_POST['computerMoves']);
//om användaren inte är inloggad sparas statistiken under användare -1. detta för att enkelt kunna plocka ut "ej inloggad data". 
$userId = -1;

//kollar om användaren är inloggad genom att kolla ifall sessions variabeln userId har något värde.
if(isset($_SESSION['userId'])){
	$userId = $_SESSION['userId'];
}

//binder data till den fördefinerade sql frågan.
$bp = $stmt->bind_param('sssis', $playerMoves, $computerMoves, $resultList, $userId, $timeStamp);

//kollar efter felmeddelande i $bp
if ( false===$bp ) {
	die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}

//kör sql frågan mot databasen.
$stmtexe = $stmt->execute();
//kollar efter felmeddelande i $stmtexe
if ( false===$stmtexe ) {
  die('execute() failed: ' . htmlspecialchars($stmt->error));
}

//stänger kopplingen till mysql databas.
$stmt->close();

?>



