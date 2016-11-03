<?php
$loginOkURL = "../index.php?loginOk"; 
$loginNotOkURL = "../index.php?loginNotOk"; 
include 'dbconn.php';

$username = strip_tags($_POST['usr']);
$pass = $_POST['pass'];
$timeStamp = date('Y-m-d H:i:s');

$stmt = $conn->prepare('SELECT userName, userPass, userEmail, first_name, last_name FROM users WHERE username=?');
$stmtTwo = $conn->prepare('UPDATE users SET last_login=? WHERE userEmail=?');
//check the prepare statement
if ( false===$stmt ) {
  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}


if ( false===$stmtTwo ) {
  die('prepare2() failed: ' . htmlspecialchars($mysqli->error));
}

$bp = $stmt->bind_param('s', $username);
$bpTwo = $stmtTwo->bind_param('ss', $timeStamp, $bindEmail);
//check the bind parameter statement
if ( false===$bp ) {
	die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}

if ( false===$bpTwo ) {
	die('bind_param2() failed: ' . htmlspecialchars($stmt->error));
}


$stmtexe = $stmt->execute();
//check the exicution of statement
if ( false===$stmtexe ) {
	die('execute() failed: ' . htmlspecialchars($stmt->error));
} 

$stmtbind = $stmt->bind_result($bindUsr, $bindPass, $bindEmail, $bindFirstName, $bindLastName);

//check the bind statement 
if (false === $stmtbind) {
	die('bind() failed: ' . htmlspecialchars($stmt->error));
}

$stmtfetch = $stmt->fetch();

//check the fetch statement
if (false === $stmtfetch) {
	die('fetch() failed: ' . htmlspecialchars($stmt->error));
}

if (empty($bindUsr)) {
	header('Location: '.$loginNotOkURL);
} else {
	if (password_verify($pass, $bindPass)) {
		session_start();
		$_SESSION["username"] = $bindUsr;
		$_SESSION["email"] = $bindEmail;
		$_SESSION["firstName"] = $bindFirstName;
		$_SESSION["lastName"] = $bindLastName;
		$stmt->close();

		$bpTwo = $stmtTwo->bind_param('ss', $timeStamp, $bindEmail);
		if ( false===$bpTwo ) {
			die('bind_param2() failed: ' . htmlspecialchars($stmt->error));
		}

		$stmtexeTwo = $stmtTwo->execute();
		if ( false===$stmtexeTwo ) {
			die('execute() failed: ' . htmlspecialchars($stmt->error));
		} 
		
		header('Location: '.$loginOkURL);
	} else {
		header('Location: '.$loginNotOkURL);
		
	}
}
$stmt->close();
$stmtTwo->close();
?>