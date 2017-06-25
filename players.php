<?php

session_start();
include 'includes/config.php';

include 'includes/start.php';
include 'includes/header.php';

?>

<div class="container">
	<section id="main">
		<h1>Players</h1>
		
		<div class="row">
			<div class="col-md-6">
				<h2>Add a Player</h2>
				
				<form action="create-player.php" method="post">
				
					<div class="form-group player">
						<label for="name">Player Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Player Name" required />
					</div>
					
					<div class="form-group teams">
						<label id="teamLabel">Choose a Team</label>
						
						<?
						
							try {
								
								// Connect to DB
								$conn = new PDO($dsn, $dbUser, $dbPass);
								
								// set the PDO error mode to exception
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								
								$sql = 'SELECT * FROM teams WHERE account_id = :account_id ORDER BY name';
								$q = $conn->prepare($sql);
								
								// Binding Single
								$q->bindParam(':account_id', $_SESSION['account_id']);
								$q->execute();
								
								if ($q->rowCount() > 0) {
									
									foreach($q->fetchAll() as $team){
										
										echo '<input type="radio" name="team_id" id="' . $team['id'] . '" class="team_id" /><label class="team-button" style="background-color: '.$team['color'].';" for="' . $team['id'] . '">' . $team['name'] . '</label>';
										
									}
									
								} else {
									
									echo '<h3>You need to add a team!  <a href="teams.php">Add Teams</a></h3>';
									
								}
								
							}
							catch(PDOException $e){
								echo "Connection failed: ". $e->getMessage();
							}
							
							// Disconnect DB
							$conn = NULL;
						
						?>
					</div>
					
					<div class="form-group">
						<input type="submit" name="submit" value="Add Player" class="btn btn-default" />
					</div>
				
				</form>
			</div>
			
			<div class="col-md-6">
				<h2>Players</h2>
				
				<?
				
				try {
					
					// Connect to DB
					$conn = new PDO($dsn, $dbUser, $dbPass);
					
					// set the PDO error mode to exception
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
					$sql = "SELECT teams.name, players.name, players.id FROM players WHERE account_id = :account_id JOIN teams ON players.team_id = teams.id ORDER BY teams.name, players.name";
					$q->prepare($sql);
					
					// Binding Single
					$q->bindParam(':account_id', $_SESSION['account_id']);
					$q->execute();
					
					if ($q->rowCount() > 0) {

/*					
						$list = array();
						
						while ( $row = $q->fetch(PDO::FETCH_ASSOC) ){

						}
						foreach($q->fetchAll() as $team){
							
							
							
						}
*/					
					} else {
						echo 'Nope';
					}
				
				}
				catch(PDOException $e){
					echo "Connection failed: ". $e->getMessage();
				}
				
				// Disconnect DB
				$conn = NULL;
				
				?>
				<div class="panel panel-default">
					<div class="panel-heading" style="">
						<h3 class="panel-title">Team Name</h3>
					</div>
					<div class="panel-body">
						<div class="player">Player Name <div class="pull-right delete">X</div></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php

include 'includes/footer.php';

?>