<?php
$passone = $_POST['passone'];
$passtwo = $_POST['passtwo'];
$wrongPassURL = "../index.php?wrongpass";
$scriptOkURL = "../index.php?usrcreated";
if ($passone != $passtwo) {
	header('Location: '.$wrongPassURL);
} else {

	include 'dbconn.php';

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

	//Form information
	$firstname = strip_tags($_POST['firstname']);
	$lastname = strip_tags($_POST['lastname']);
	$email = strip_tags($_POST['email']);
	$username = strip_tags($_POST['username']);
	$password = password_hash($_POST['passone'], PASSWORD_DEFAULT);
	$timeStamp = date('Y-m-d H:i:s');


	$stmtexe = $stmt->execute();
	//check the exicution of statement
	if ( false===$stmtexe ) {
	  die('execute() failed: ' . htmlspecialchars($stmt->error));
	} else {
		//return to register and login page
		header('Location: '.$scriptOkURL);
	}


}
/*
firstname
lastname
email
username
passone
passtwo
*/
?>



