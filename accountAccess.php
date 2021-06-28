<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping List Account Login/Creation</title>
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

		$username = $_POST["username"];
		$password = $_POST["password"];

		//Determine action
		if($_POST["createAccount"]){
			if($username == "" and $password != ""){
				echo "Password can't be blank <br>
					<form action='login.php' method='POST'>
						<h3>Back</h3>
						<input type='submit'>
					</form>";
			}
			else if($username != "" and $password == ""){
				echo "Username can't be blank <br>
					<form action='login.php' method='POST'>
						<h3>Back</h3>
						<input type='submit'>
					</form>";
			}
			else if($username == "" and $password == ""){
				echo "Username and password can't be blank <br>
					<form action='login.php' method='POST'>
						<h3>Back</h3>
						<input type='submit'>
					</form>";
			}
			else if($username != "" and $password != ""){
				$sqli = "SELECT 1 FROM accounts WHERE username = '$username'";
				$result = $conn->query($sqli);
				if($result->num_rows == 1){
					echo "Username already exists <br>
					<form action='login.php' method='POST'>
						<h3>Back</h3>
						<input type='submit'>
					</form>
					";
				}
				if($result->num_rows == 0){
					$sqli = "INSERT INTO accounts (username, password) VALUES ('$username','$password')";
					$result = $conn->query($sqli);
					echo "Account created! <br>
					<form action='login.php' method='POST'>
						<h3>Back</h3>
						<input type='submit'>
					</form>";
				}
			}
			
		}
		if($_POST["login"]){
			$sqli = "SELECT username, password FROM accounts WHERE username = '$username' AND password = '$password'";
			$result = $conn->query($sqli);
			if($result->num_rows == 1){
				$conn->close();
				header("Location: /ShoppingList.php");
			}
			if($result->num_rows == 0){
				echo "Username or password is incorrect <br>
					<form action='login.php' method='POST'>
						<h3>Back</h3>
						<input type='submit'>
					</form>";

			}
		}

	?>
</body>
</html>