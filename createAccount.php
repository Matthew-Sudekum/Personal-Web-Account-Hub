<!DOCTYPE html>
<html>
<head>
	<title>Create an account</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="validate.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#create").validate({
			  rules: {
			    password: {
			      minlength: 8
			    },
			    confirmPassword: {
			      equalTo: "#password"
			    }
			  }
			});
		});
	</script>
</head>
<body>
	<div class="form">
		<h2>Account Creation</h2>
		<form action="accountCreation.php" method="POST" id="create">
			<h3>Email: </h3>
			<input type="email" name="email" class="required">
			<h3>Username: </h3>
			<input type="text" name="username" class="required">
			<h3>Password:</h3>
			<input type="password" name="password" id="password" class="required">
			<br>
			<h3>Confirm Password:</h3>
			<input type="password" name="confirmPassword" class="required">
			<br>
			<input type="submit" name="createAccount" value="Create Account">
		</form>
		<a href="index.php"><p style="color:grey">Already have an account?</p></a>
	</div>
</body>
</body>
</html>