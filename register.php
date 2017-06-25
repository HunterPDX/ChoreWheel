<?php

$title = "Chore Wheel | Create an Account";
$description = "";

include "includes/config.php";

if ( isset($_POST['submit']) ){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$username = filter_var($username, FILTER_SANITIZE_STRING);
	$password = filter_var($password, FILTER_SANITIZE_STRING);
	
	if ( $username != "" && $password != "" ){

		try {
			// Connect to DB
			$conn = new PDO($dsn, $dbUser, $dbPass);
			
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = 'SELECT id FROM accounts WHERE username = :username';
			$q = $conn->prepare($sql);
			
			// Binding Single
			$q->bindParam(':username', $username);
			$q->execute();
			
			// Avoid Duplicates
			if ($q->rowCount() ===0){
				
				// Hash Password
				$password = password_hash($password, PASSWORD_DEFAULT);
				
				$sql = 'INSERT INTO accounts (username, password, last_login) VALUES (:username, :password, NOW())';
				$q = $conn->prepare($sql);
				
				$q->execute(array(
					':username' => $username,
					':password' => $password
				));
				
				Header("Location: login.php");

			} else {
				
				$errorMsg = "Username Already Exists";
				
			}
			
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		
		// Disconnect from DB
		$conn = null;
		
	} else {
		
		$errorMsg = "Please Enter Username and Password";
		
	}
	
}

?>

<?
include "includes/start.php";
include "includes/header.php";
?>

<div class="container">
	<section id="main">
		<h1>Create an Account</h1>
		
		<form action="" method="post" id="register">
		
			<div class="form-group">
				<label for="username" id="usernameLabel">Username</label>
				<input type="text" name="username" id="username" placeholder="Username" class="form-control" required />
			</div>
			
			<div class="form-group">
				<label for="username" id="usernameLabel">Password</label>
				<input type="password" name="password" id="password" placeholder="Password" class="form-control" required />
			</div>
			
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-default" value="Submit" />
			</div>
		</form>
	</section>
</div>

<?
include "includes/footer.php";
?>