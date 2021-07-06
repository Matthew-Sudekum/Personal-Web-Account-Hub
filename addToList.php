<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add To List</title>
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
		$quantity = $_POST["quantity"];
		$form_username = $_SESSION["username"];

		$sqli = "INSERT INTO shoppingList (item, quantity, account) values ('$item', '$quantity', '$form_username')";
		$result = $conn->query($sqli);

		$conn->close();

		header("Location: /my_files/PWAH/Personal-Web-Account-Hub/ShoppingList.php");
	?>
</body>
</html>
