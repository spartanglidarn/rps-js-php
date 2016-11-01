<?php
session_start();
$startPage = "../index.php";

	// remove all session variables
	session_unset(); 
	// destroy the session 
	session_destroy();

	header('Location: '.$startPage);

?>