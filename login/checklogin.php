<?php
header('Content-type: text/plain');

$loginOkURL = "../index.php?loginOk"; 
$loginNotOkURL = "../index.php?loginNotOk";
$loginWrongUsrname ="../index.php?wrongUsr"; 
$loginWrongPass = "../index.php?wrongPass";
include 'dbconn.php';

$username = strip_tags($_POST['usr']);
$pass = $_POST['pass'];
$timeStamp = date('Y-m-d H:i:s');

$stmt = $conn->prepare('SELECT userId, userName, userPass, userEmail, first_name, last_name FROM users WHERE username=?');

//check the prepare statement
if ( false===$stmt ) {
  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}


$bp = $stmt->bind_param('s', $username);

//check the bind parameter statement
if ( false===$bp ) {
	die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}


$stmtexe = $stmt->execute();
//check the exicution of statement
if ( false===$stmtexe ) {
	die('execute() failed: ' . htmlspecialchars($stmt->error));
} 

$stmtbind = $stmt->bind_result($bindId, $bindUsr, $bindPass, $bindEmail, $bindFirstName, $bindLastName);

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
	$stmt->close();
	header('Location: '.$loginWrongUsrname);
} else {
	if (password_verify($pass, $bindPass)) {
		session_start();
		$_SESSION["userId"] = $bindId;
		$_SESSION["username"] = $bindUsr;
		$_SESSION["email"] = $bindEmail;
		$_SESSION["firstName"] = $bindFirstName;
		$_SESSION["lastName"] = $bindLastName;
		$stmt->close();

		$stmtTwo = $conn->prepare('UPDATE users SET last_login=? WHERE userEmail=?');

		if ( false===$stmtTwo ) {
 			die('prepare2() failed: ' . htmlspecialchars($mysqli->error));
		}

		$bpTwo = $stmtTwo->bind_param('ss', $timeStamp, $bindEmail);
		if ( false===$bpTwo ) {
			die('bind_param2() failed: ' . htmlspecialchars($stmtTwo->error));
		}

		$stmtexeTwo = $stmtTwo->execute();
		if ( false===$stmtexeTwo ) {
			die('execute2() failed: ' . htmlspecialchars($stmtTwo->error));
		} 
		$stmtTwo->close();
		header('Location: '.$loginOkURL);
	} else {
		$stmt->close();
		header('Location: '.$loginWrongPass);
	}
}


?>