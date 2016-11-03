<?php

if(isset($_SESSION['username'])){
	echo '<h3>Welcome ' . $_SESSION['firstName'] . 'your id is ' . $_SESSION['userId'] . '!</h3>';
	echo '<li><a href="#">My profile</a></li>';
	echo '<li><a href="#">High score</a></li>';
	echo '<li><a href="#">Challenge a friend</a></li>';
	echo '<li><a href="#">Favourite move</a></li>';
	echo '<li><a href="login/logout.php">Log out</a></li>';

} else {
	echo '<li><a href="#" id="loginBtn">Login</a></li>';
	echo '<li><a href="#" id="newAccBtn">Create account</a></li>';
}
?>