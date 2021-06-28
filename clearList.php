<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Clear List</title>
</head>
<body>
	<?php 
		$servername = "localhost";
		$username = "shoppingList";
		$password = "shopping";
		$dbname = "shoppinglist";

		//Create Connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		//Check Connection
		if($conn->connect_error){
			die("Connection error: " . $conn->connect_error);
		}


		$sqli = "DELETE FROM list";
		$result = $conn->query($sqli);

		$conn->close();

		header("Location: /ShoppingList.php");
	?>
</body>
</html>