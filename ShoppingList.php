<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Shopping List</title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="validate.js"></script>
	<script type="text/javascript" src="simpleValidate.js"></script>
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
			<div class='content'>
				<form action='addToList.php' method='POST' id='list'>
					<h2>Shopping List</h2>
					<h3>Item</h3>
					<input type='text' name='item' class='required' onkeypress='return alpha(event)'>
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
			<div class='leftInFlex'>
				<div class='logOut'>
					<form action='index.php' method='POST'>
						<input type='submit' name='logOut' value='Log Out'>
					</form>
				</div>
			</div>";

		//Create Connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		//Check Connection
		if($conn->connect_error){
			die("Connection error: " . $conn->connect_error);
		}

		$form_username = $_SESSION["username"];

		//CRUD
		$sqli = "SELECT * FROM shoppingList WHERE username = '$form_username'";
		$result = $conn->query($sqli);
		if($result->num_rows > 0){
			$html2 = "<div class='main'><div class='column'><table><tr style='height:20px'><th>Item</th><th>Quantity</th><th>Remove</th></tr>";
			while ($list = $result->fetch_assoc()) {
				$html2 .= "<tr style='height:35px'><td>" . $list["item"] . "</td>
				<td>" . $list["quantity"] . "</td>
				<td><form action='removeItem.php' method='POST'><input type='hidden' name='item' value='".$list['item']."'></input><input type='checkbox' onChange='this.form.submit()'></input></form></td>" . "</tr>";
			}
			$html2 .= "</table>" . $html . "</div></div>";
			echo $html2;
		}
		else{
			echo "<div class='main'><div class='column'>
				<table>
					<tr style='height:20px'><th>Item</th><th>Quantity</th></tr>" . 
					"<tr style='height:35px'><td><p style='color:red'>0 results found</p></td><td><p style='color:red'>-</p></td></tr>
				</table>" . 
				$html . 
			"</div></div>";
		}
		$conn->close();
	?>
</body>
</html>
