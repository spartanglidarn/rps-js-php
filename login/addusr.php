<?php
$passone = $_POST['passone'];
$passtwo = $_POST['passtwo'];
$wrongPassURL = "../index.php?passNoMatch";
$emailInUse = "../index.php?emailInUse";
$userInUse = "../index.php?userInUse";
$scriptOkURL = "../index.php?usrCreated";

if ($passone != $passtwo) {
	header('Location: '.$wrongPassURL);
} else {

	include 'dbconn.php';

	//Form information
	$firstname = strip_tags($_POST['firstname']);
	$lastname = strip_tags($_POST['lastname']);
	$email = strip_tags($_POST['email']);
	$username = strip_tags($_POST['username']);
	$password = password_hash($_POST['passone'], PASSWORD_DEFAULT);
	$timeStamp = date('Y-m-d H:i:s');

	// kolla om epost-adress finns i databas
	$stmt = $conn->prepare('SELECT userEmail FROM users WHERE userEmail = ?');
	if ( false===$stmt ) {
	  die('prepare() email check failed: ' . htmlspecialchars($mysqli->error));
	}

	$bp = $stmt->bind_param('s', $email);
	if ( false===$bp ) {
		die('bind_param() email check failed: ' . htmlspecialchars($stmt->error));
	}

	$stmtexe = $stmt->execute();
	if (false===$stmtexe) {
		die('execute() email check failed: ' . htmlspecialchars($stmt->error));
	}

	$stmtbind = $stmt->bind_result($checkEmail);
	if (false === $stmtbind) {
		die('bind() email check failed: ' . htmlspecialchars($stmt->error));
	}

	//kolla ifall eposten redan finns i databasen, om den gör det skicka tillbaka anävndaren till loginformuläret.
	if (!$checkEmail) {
		header('Location: '.$emailInUse);
	}
	//stäng stmt så att vi sen kan öppna en ny
	$stmt->close();

	//kolla om användarnamnet finns i databasen.
	$stmt = $conn->prepare('SELECT userName FROM users WHERE userName = ?');
	if ( false===$stmt ) {
	  die('prepare() username check failed: ' . htmlspecialchars($mysqli->error));
	}

	$bp = $stmt->bind_param('s', $username);
	if ( false===$bp ) {
		die('bind_param() email check failed: ' . htmlspecialchars($stmt->error));
	}

	$stmtexe = $stmt->execute();
	if (false===$stmtexe) {
		die('execute() email check failed: ' . htmlspecialchars($stmt->error));
	}

	$stmtbind = $stmt->bind_result($checkUsername);
	if (false === $stmtbind) {
		die('bind() email check failed: ' . htmlspecialchars($stmt->error));
	}

	//kolla ifall eposten redan finns i databasen, om den gör det skicka tillbaka anävndaren till loginformuläret.
	if (!$checkUsername) {
		header('Location: '.$userInUse);
	}
	//stäng stmt så att vi senda kan öppna en ny
	$stmt->close();


	//skapar sql request för att skapa användaren.
	$stmt = $conn->prepare('INSERT INTO users (userName, userEmail, userPass, first_name, last_name, reg_date)
							VALUES (?, ?, ?, ?, ?, ?)');
	//check the prepare statement
	if ( false===$stmt ) {
	  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
	}

	$bp = $stmt->bind_param('ssssss', $username, $email, $password, $firstname, $lastname, $timeStamp);
	//check the bind parameter statement
	if ( false===$bp ) {
		die('bind_param() failed: ' . htmlspecialchars($stmt->error));
	}


	$stmtexe = $stmt->execute();
	//check the exicution of statement
	if ( false===$stmtexe ) {
		die('execute() failed: ' . htmlspecialchars($stmt->error) . $stmt->errno . ":  " . $stmt->sqlstate);
	} else {
		//return to register and login page
		header('Location: '.$scriptOkURL);
	}

}
// username: 23000
/*
firstname
lastname
email
username
passone
passtwo
*/
?>



