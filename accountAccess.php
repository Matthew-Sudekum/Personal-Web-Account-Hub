<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Shopping List Account Login/Creation</title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
		session_start();

		$servername = "localhost";
		$username = "pwah";
		$password = "mysql";
		$dbname = "personal-web-account-hub";

		//Create Connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		//Check Connection
		if($conn->connect_error){
			die("Connection error: " . $conn->connect_error);
		}

		//Get form data
		$form_username = $_POST["username"];
		$form_password = $_POST["password"];

		//Validate
		if($_POST["login"]){
			$sqli = "SELECT username, password FROM accounts WHERE username = '$form_username' AND password = '$form_password'";
			$result = $conn->query($sqli);
			if($result->num_rows == 1){
				$conn->close();
				$_SESSION["username"] = $form_username;
				header("Location: /Personal-Web-Account-Hub/ShoppingList.php");
			}
			if($result->num_rows == 0){
				echo "<div class='validation'>Username or password is incorrect <br><form action='index.php' method='POST'><input type='submit' value='Back'></form></div>";
			}
		}
	?>
</body>
</html>
