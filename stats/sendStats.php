<?php
session_start();
include '../login/dbconn.php';
$timeStamp = date('Y-m-d H:i:s');

$stmt = $conn->prepare('INSERT INTO stats (playerMoves, computerMoves, resultList, userId, reg_date)
						VALUES (?, ?, ?, ?, ?)');
if ( false===$stmt ) {
	  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}
//$value = "SendStats String";
$resultList = implode("," , $_POST['resultList']);
$playerMoves = implode("," , $_POST['playerMoves']);
$computerMoves = implode("," , $_POST['computerMoves']);
$userId = -1;
//if the player is loged in use session id for loged in user. 
if(isset($_SESSION['userId'])){
	$userId = $_SESSION['userId'];
}

//foreach ($_POST as $value) {

	$bp = $stmt->bind_param('sssis', $playerMoves, $computerMoves, $resultList, $userId, $timeStamp);
	
	if ( false===$bp ) {
		die('bind_param() failed: ' . htmlspecialchars($stmt->error));
	}

	$stmtexe = $stmt->execute();
	
	if ( false===$stmtexe ) {
	  die('execute() failed: ' . htmlspecialchars($stmt->error));
	}
//};

$stmt->close();


/*
playerMoves: playerMoves,
computerMoves: computerMoves,
resultList: resultList
*/

/*CREATE TABLE stats
(
id int NOT NULL,
playerMoves varchar(255),
computerMoves varchar(255),
resultList varchar(255),
userId int(60),
time TIMESTAMP,
PRIMARY KEY (id)
);*/
?>



