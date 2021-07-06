<!DOCTYPE html>
<html>
<head>
	<title>Account Creation</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
		$servername = "localhost";
		$dbusername = "pwah";
		$dbpassword = "mysql";
		$dbname = "personal-web-account-hub";

		//Create Connection
		$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		//Check Connection
		if($conn->connect_error){
			die("Connection error: " . $conn->connect_error);
		}

		if($_POST["createAccount"]){

			//get form data
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$form_data = ['Username' => $username, 'Email' => $email, 'Password' => $password];

			//validate data
			$blankInput = "";
			$validate;
			foreach ($form_data as $key=>$value) {
				if($value == ""){
					echo "<div class='validation'>All fields required<br><form action='createAccount.php' method='POST'><input type='submit' value='Back'></form></div>";
					$blankInput = $key;
					break;
				}
			}
			if($blankInput == ""){
				foreach ($form_data as $key=>$value) {
					if($key == 'Username'){
						$sqli = "SELECT 1 FROM `accounts` WHERE `username` = '$username'";
						$result = $conn->query($sqli);
						if($result->num_rows == 1){
							echo "<div class='validation'>Username already exists<br><form action='createAccount.php' method='POST'><input type='submit' value='Back'></form></div>";
							$validate = "no";
							break;
						}
						if($result->num_rows == 0){
							$validate = "yes";
							//do nothing
						}
					}
					if($key == 'Email'){
						$sqli = "SELECT 1 FROM `accounts` WHERE `email` = '$email'";
						$result = $conn->query($sqli);
						if($result->num_rows == 1){
							echo "<div class='validation'>Email already exists <br><form action='createAccount.php' method='POST'><input type='submit' value='Back'></form></div>";
							$validate = "no";
							break;
						}
						if($result->num_rows == 0){
							$validate = "yes";
							//do nothing
						}
					}
					if($key == 'Password'){
						$validate = "yes";
						//do nothing
					}
				}
				if($validate == "yes"){
					$sqli = "INSERT INTO accounts(username, email, password) VALUES ('$username', '$email', '$password')";
					$result = $conn->query($sqli);
					echo "<div class='validation'>Account created! <br><form action='index.php' method='POST'><input type='submit' value='Back'></form></div>";
				}
				if($validate == "no"){
					//do nothing else
				}
			}
			else{
				//Had a blank input
				//do nothing else
			}
		}
	?>
</body>
</html>