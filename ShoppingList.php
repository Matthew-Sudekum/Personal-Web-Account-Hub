<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping List</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "pwah";
		$password = "mysql";
		$dbname = "personal-web-account-hub";
		$html = "
			<div class='form'>
				<form action='addToList.php' method='POST'>
					<h2>Shopping List</h2>
					<h3>Item</h3>
					<input type='text' name='item'>
					<br>
					<h3>Quantity</h3>
					<input type='text' name='quantity'>
					<br>
					<h3>Add To List</h3>
					<input type='submit' name='addToList'>
				</form>
				<form action='clearList.php' method='POST'>
					<h3>Clear Shopping List</h3>
					<input type='submit' name='clearList'>
				</form>
			</div>";

		//Create Connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		//Check Connection
		if($conn->connect_error){
			die("Connection error: " . $conn->connect_error);
		}

		//CRUD
		$sqli = "SELECT * FROM shoppingList";
		$result = $conn->query($sqli);
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				echo "<div class='main'>" . "&centerdot; item: " . $row["item"] . " - quantity: " . $row["quantity"] . $html . "</div>";
			}
		}
		else{
			echo "<div class='main'>" . "
				<div class='listTable'>
					<p style='color:red'>0 results found</p>
				</div>" . $html . "</div>";
		}
		$conn->close();
	?>

</body>
</html>