<?php
//lägger till en användare i databasen. 
$passone = $_POST['passone'];
$passtwo = $_POST['passtwo'];
$wrongPassURL = "../index.php?passNoMatch";
$emailInUse = "../index.php?emailInUse";
$userInUse = "../index.php?userInUse";
$scriptOkURL = "../index.php?usrCreated";

//kollar ifall användaren har skrivit samma lösen i båda lösenords rutorna. Om de inte är samma skickas användaren tillbaka med en GET parameter och ett felmeddelande visas. Om lösenorden stämmer går programmet vidare med att skapa användaren.
if ($passone != $passtwo) {
	header('Location: '.$wrongPassURL);
} else {
	include 'dbconn.php';

	//hämtar informationen från formulär och lägger in den i variabler
	$firstname = strip_tags($_POST['firstname']);
	$lastname = strip_tags($_POST['lastname']);
	$email = strip_tags($_POST['email']);
	$username = strip_tags($_POST['username']);
	//krypterar lösen med hjälp av PHP's inbyggda API
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

	//Ifall eposten redan finns i databasen skickas användaren tillbaka till startsidan med en get variabel och ett felmeddelande visas.
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

	//Ifall användarnamnet redan finns i databasen skickas användaren tillbaka till startsidan med en get variabel och ett felmeddelande visas.
	if (!$checkUsername) {
		header('Location: '.$userInUse);
	}
	//stäng stmt så att vi senda kan öppna en ny
	$stmt->close();


	//skapar sql request för att skapa användaren.
	$stmt = $conn->prepare('INSERT INTO users (userName, userEmail, userPass, first_name, last_name, reg_date)
							VALUES (?, ?, ?, ?, ?, ?)');
	//felmeddelande för prepare statement
	if ( false===$stmt ) {
	  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
	}

	$bp = $stmt->bind_param('ssssss', $username, $email, $password, $firstname, $lastname, $timeStamp);
	if ( false===$bp ) {
		die('bind_param() failed: ' . htmlspecialchars($stmt->error));
	}


	$stmtexe = $stmt->execute();
	if ( false===$stmtexe ) {
		die('execute() failed: ' . htmlspecialchars($stmt->error) . $stmt->errno . ":  " . $stmt->sqlstate);
	} else {
		//ifall inga felmeddelanden returnerats från databasen så antar vi att användaren har skapats och skickar tillbaka användaren till startsidan med get variabel så loginformuläret kan visas.
		header('Location: '.$scriptOkURL);
	}

}

?>



