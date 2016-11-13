<?php
$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$servername = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$dbname = ltrim($dbparts['path'],'/');


/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connection_error);
}

?>