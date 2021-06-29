<!DOCTYPE html>
<html>
<head>
	<title>Account Creation</title>
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
					echo "All fields required<br>
						<form action='createAccount.php' method='POST'>
							<input type='submit' value='Back'>
						</form>";
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
							echo "Username already exists<br>
								<form action='createAccount.php' method='POST'>
									<input type='submit' value='Back'>
								</form>
							";
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
							echo "Email already exists <br>
								<form action='createAccount.php' method='POST'>
									<input type='submit' value='Back'>
								</form>
							";
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
					echo "Account created! <br>
						<form action='login.php' method='POST'>
							<input type='submit' value='Back'>
						</form>";
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