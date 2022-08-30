<!DOCTYPE html>
<html>
<head>
	<title>Remove Item</title>
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

		$item = $_POST["item"];
		$form_username = $_SESSION["username"];

		$sqli = "DELETE FROM shoppingList where item = '$item' AND username = '$form_username'";
		$result = $conn->query($sqli);

		$conn->close();

		header("Location: /Personal-Web-Account-Hub/ShoppingList.php");
	?>
</body>
</html>
