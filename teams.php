<?php
include "includes/config.php";

$title = "Chore Wheel | Create Your Teams";
$description = "";

session_start();
include "includes/lockout.php";


if ( isset($_POST['submit']) ){
	
	$name = $_POST['teamName'];
	$color = $_POST['teamColor'];
	$account_id = $_SESSION['account_id'];
	
	// Filter Post Data
	$name = filter_var($name, FILTER_SANITIZE_STRING);
	$color = filter_var($color, FILTER_SANITIZE_STRING);
	
	// Check that fields were not empty
	if ( $name != "" && $color != "" ){
		try {
			// Connect to DB
			$conn = new PDO($dsn, $dbUser, $dbPass);
			
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = 'SELECT id FROM teams WHERE name = :name';
			$q = $conn->prepare($sql);
			
			// Binding Single
			$q->bindParam(':name', $name);
			$q->execute();
			
			// Avoid Duplicates
			if ($q->rowCount() ===0){
				
				$sql = 'INSERT INTO teams (name, color, account_id) VALUES (:name, :color, :account_id)';
				$q = $conn->prepare($sql);
				
				$q->execute(array(
					':name' => $name,
					':color' => $color,
					':account_id' => $account_id
				));
				
				$success = "The team " . $name . " has been successfully created!";
				
			} else {
				$error = "Team Name already exists";
			}
			
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		
		// Disconnect from DB
		$conn = null;
		
	} else {
		$error = "Please enter a Team Name and select a Team Color";
	}
	
}





include "includes/start.php";
include "includes/header.php";

?>

<div class="container">
	<section id="main">
	
		<? if ( isset($error) ){ echo '<div class="alert alert-danger error">' . $error . '</div>';} ?>
		<? if ( isset($success) ){echo '<div class="alert alert-success success">' . $success . '</div>';} ?>
	
		<h1>Create Your Teams!</h1>
		<div class="col-md-6">
			<h2>Add a Team</h2>
			<form action="" method="post" id="create-team">
				<div class="form-group">
					<label for="teamName" id="teamNameLabel">Team Name</label>
					<input type="text" name="teamName" id="teamName" placeholder="Team Name" class="form-control" required />
				</div>
				
				<div class="form-group">
					<label id="teamColorLabel">Select a Color</label>
					
					<input type="radio" name="teamColor" class="color-check" id="teamColorBlue" value="#0000ff" />
					<label class="team-color-button blue" for="teamColorBlue"></label>
					
					<input type="radio" name="teamColor" class="color-check" id="teamColorBlack" value="#000000" />
					<label class="team-color-button black" for="teamColorBlack"></label>
					
					<input type="radio" name="teamColor" class="color-check" id="teamColorRed" value="#cc0000" />
					<label class="team-color-button red" for="teamColorRed"></label>
					
					<input type="radio" name="teamColor" class="color-check" id="teamColorGreen" value="#008000" />
					<label class="team-color-button green" for="teamColorGreen"></label>
					
					<input type="radio" name="teamColor" class="color-check" id="teamColorOrange" value="#ffa500" />
					<label class="team-color-button orange" for="teamColorOrange"></label>
					
					<input type="radio" name="teamColor" class="color-check" id="teamColorPink" value="#ffc0cb" />
					<label class="team-color-button pink" for="teamColorPink"></label>
					
					<input type="radio" name="teamColor" class="color-check" id="teamColorYellow" value="#ffff00" />
					<label class="team-color-button yellow" for="teamColorYellow"></label>
					
					<input type="radio" name="teamColor" class="color-check" id="teamColorBrown" value="#a52a2a" />
					<label class="team-color-button brown" for="teamColorBrown"></label>
					
				</div>
				
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-default" value="Add Team" />
				</div>
			</form>
		</div>
		
		<div class="col-md-6">
			<h2>Teams</h2>
			
			<? 
			try {
				// Connect to DB
				$conn = new PDO($dsn, $dbUser, $dbPass);
				
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = 'SELECT id, name, color FROM teams WHERE account_id = :account_id ORDER BY name';
				$q = $conn->prepare($sql);
				
				// Binding Single
				$q->bindParam(':account_id', $_SESSION['account_id']);
				$q->execute();
				
				if ($q->rowCount() > 0) {
					
					foreach($q->fetchAll() as $team){
						
						echo '<div class="team" style="background-color:' . $team['color'] . ';">' . $team['name'] . '<div class="pull-right delete" id="'.$team['id'].'">X</div></div>';
						
					}
					
				} else {
					
					echo '<h3>You have no teams! You should add one!</h3>';
					
				}
				
				
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
			}
			
			// Disconnect from DB
			$conn = null;
			?>
			
		</div>
	</section>
</div>



<?
include "includes/footer.php";
?>