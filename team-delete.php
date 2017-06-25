<?php

session_start();
include 'includes/config.php';

if ( isset($_POST['delete']) ){
	
	$deleteID = filter_var($_POST['delete'],FILTER_SANITIZE_NUMBER_INT);
	
	try {
			// Connect to DB
			$conn = new PDO($dsn, $dbUser, $dbPass);
			
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = 'SELECT * FROM teams WHERE id = :id AND account_id = :account_id';
			$q = $conn->prepare($sql);
			
			// Binding Single
			$q->bindParam(':id', $deleteID);
			$q->bindParam(':account_id', $_SESSION['account_id']);
			$q->execute();
			
			// Avoid Duplicates
			if ($q->rowCount() > 0){
				
				$sql = 'DELETE FROM teams where id = :id';
				$q = $conn->prepare($sql);
				
				$q->bindParam(':id', $deleteID);
				$q->execute();
				
				return 'Record successfully deleted';
				
			}
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	
	// Disconnect from DB
	$conn = null;
	
	
	
}