<?php

$title = "Chore Wheel | Log In";
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
			
			$sql = 'SELECT * FROM accounts WHERE username = :username';
			$q = $conn->prepare($sql);

			// Binding Single
			$q->bindParam(':username', $username);
			$q->execute();

			// Verify Username Exists
			if ($q->rowCount() > 0) {
				
				$user = $q->fetch();
				
				$user_id = $user['id'];
				$username = $user['username'];
				$hash = $user['password'];
				
				if ( password_verify($password, $hash) ){
					
					$sql = 'UPDATE accounts SET last_login = NOW() WHERE username = :username';
					$q = $conn->prepare($sql);
					
					// Binding Single
					$q->bindParam(':username', $username);
					$q->execute();
					
					session_start();
					
					$_SESSION['account_id'] = $user_id;
					$_SESSION['username'] = $username;
					
					Header("Location: dashboard.php");
					
				} else {
					
					$errorMsg = "Invalid Username or Password";
					
				}
				
			} else {
				
				$errorMsg = "Invalid Username or Password";
				
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
		<h1>Log In</h1>
		<? if ( isset($errorMsg) ){echo '<div class="alert alert-danger error">' . $errorMsg . '</div>';} ?>
		<form action="" method="post" id="login">
		
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