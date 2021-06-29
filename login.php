<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping List Home</title>
</head>
<body>
	<h2>Home</h2>
	<form action="accountAccess.php" method="POST">
		<h3>Username: </h3>
		<input type="text" name="username">
		<h3>Password</h3>
		<input type="password" name="password">
		<br>
		<input type="submit" name="login" value="Login">
		<a href="createAccount.php"><p style="color:grey">Need an account?</p></a>
	</form>
</body>
</html>