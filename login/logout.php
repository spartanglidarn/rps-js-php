<?php
//stänger sessionen som skapats när användaren loggat in och tömmer alla sessions variabler
session_start();
$startPage = "../index.php";

	// tar bort alla sessions variabler.
	session_unset(); 
	// stänger sessionen.
	session_destroy();

	//skickar användaren till startsidan.
	header('Location: '.$startPage);

?>