<!DOCTYPE html>
<html>
<head>
	<title>Clear List</title>
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

		$form_username = $_SESSION["username"];

		$sqli = "DELETE FROM shoppingList WHERE username = '$form_username'";
		$result = $conn->query($sqli);

		$conn->close();

		header("Location: /Personal-Web-Account-Hub/ShoppingList.php");
	?>
</body>
</html>
