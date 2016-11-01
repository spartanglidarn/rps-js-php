<?php
session_start();
$errorMsg = "";
if(isset($_GET['wrongpass'])){
	$errorMsg = "Both passwords need to be identical";
}
if(isset($_GET['usrcreated'])){
	$errorMsg = "User created!";
}
if(isset($_GET['loginok'])){
	$errorMsg = "Login OK!!!!";
}
if(isset($_GET['loginNotok'])){
	$errorMsg = "Wrong username or password!!!";
}
echo "<h1>" . $errorMsg . "</h1>";
?>


<html>
<html lang="sv">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<div>
	<!-- login form -->
	<h3>Login form</h3>
	<form method="POST" action="checklogin.php">
		<label>Username:</label><br>
		<input type="text" name="usr"><br>
		<label>Password:</label><br>
		<input type="password" name="pass"><br>
		<input type="submit" name="submit">
	</form>
	</div>


	<div>
	<!-- registration form -->
	<h3>Registration form</h3>
	<form method="POST" action="addusr.php">
		<label>Firstname: </label><br>
		<input type="text" name="firstname"><br>
		<label>Lastname:</label><br>
		<input type="text" name="lastname"><br>
		<label>Email: </label><br>
		<input type="text" name="email"><br>
		<label>Username: </label><br>
		<input type="text" name="username"><br>
		<label>Password: </label><br>
		<input type="password" name="passone"><br>
		<label>Repeat password: </label><br>
		<input type="password" name="passtwo"><br>
		<input type="submit" name="submit">
	</form>
	</div>

<br>
<?php
if(isset($_SESSION['username'])){
	print_r($_SESSION);
}
?>

</body>

</html>

