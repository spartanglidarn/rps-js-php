<?php

if(isset($_SESSION['username'])){
	echo '<h3>Welcome ' . $_SESSION['firstName']. '!</h3>';
	//COMMING SOON. 
	//echo '<li><a href="#">My profile</a></li>';
	//echo '<li><a href="#">Challenge a friend</a></li>';
	//sidor att visa inloggad användare.
	echo '<li><a href="stats.php">Stats</a></li>';
	echo '<li><a href="login/logout.php">Log out</a></li>';

} else {
	//sidor att visa en ej inloggad användare
	echo '<li><a href="#" id="loginBtn">Login</a></li>';
	echo '<li><a href="#" id="newAccBtn">Create account</a></li>';
}
?>