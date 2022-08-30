<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Shopping List Home</title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="validate.js"></script>
	<script type="text/javascript" src="simpleValidate.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#logIn").validate();
		});
	</script>
</head>
<body>
	<div class="main">
		<div class="content">
			<h2>Log-In</h2>
			<form action="accountAccess.php" method="POST" id="logIn">
				<h3>Username: </h3>
				<input type="text" name="username" id="username" class="required">
				<h3>Password:</h3>
				<input type="password" name="password" id="password" class="required">
				<br>
				<input type="submit" name="login" value="Login">
			</form>
			<a href="createAccount.php"><p style="color:grey; margin-top: 5px;">Need an account?</p></a>
		</div>
	</div>
</body>
</html>
