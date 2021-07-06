<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping List</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="validate.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#list").validate({
			  rules: {
			    quantity: {
			      digits: true
			    }
			  }
			});
		});
	</script>
</head>
<body>
	<?php
		session_start();

		$servername = "localhost";
		$username = "pwah";
		$password = "mysql";
		$dbname = "personal-web-account-hub";

		$html = "
			<div class='form'>
				<form action='addToList.php' method='POST' id='list'>
					<h2>Shopping List</h2>
					<h3>Item</h3>
					<input type='text' name='item' class='required'>
					<br>
					<h3>Quantity</h3>
					<input type='text' name='quantity' class='required'>
					<br>
					<h3>Add To List</h3>
					<input type='submit' name='addToList' value='Submit'>
				</form>
				<form action='clearList.php' method='POST'>
					<h3>Clear Shopping List</h3>
					<input type='submit' name='clearList' value='Submit'>
				</form>
			</div>
			<div class='logOut'>
				<form action='index.php' method='POST'>
					<input type='submit' name='logOut' value='Log Out'>
				</form>
			</div>";

		//Create Connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		//Check Connection
		if($conn->connect_error){
			die("Connection error: " . $conn->connect_error);
		}

		$form_username = $_SESSION["username"];

		//CRUD
		$sqli = "SELECT * FROM shoppingList WHERE account = '$form_username'";
		$result = $conn->query($sqli);
		if($result->num_rows > 0){
			$html2 = "<div class='main'><table><tr style='height:20px'><th>Item</th><th>Quantity</th></tr>";
			while ($list = $result->fetch_assoc()) {
				$html2 .= "<tr style='height:35px'><td>" . $list["item"] . "</td><td>" . $list["quantity"] . "</td></tr>";
			}
			$html2 .= "</table>" . $html . "</div>";
			echo $html2;
		}
		else{
			echo "<div class='main'><table><tr style='height:20px'><th>Item</th><th>Quantity</th></tr>" . "<tr style='height:35px'><td><p style='color:red'>0 results found</p></td><td><p style='color:red'>-</p></td></tr></table>" . $html . "</div>";
		}
		$conn->close();
	?>
</body>
</html>