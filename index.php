<?php

session_start();

include "includes/config.php";

$title = "Chore Wheel | Welcome";
$description = "A small web application to provide families, friends, and roommates with a fun and easy way to divide chores and responsabilities. Log in, build your chore list, set your rewards, and add some fun back into your daily duties!";

include "includes/start.php";
include "includes/header.php";

?>

<div class="container">
	
	<section id="main-home">
		<h1>The Chore Wheel</h1>
		
		<div class="row">
			<div class="call-to-action col-md-4">
				<h2>Flexible</h2>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
			
			<div class="call-to-action col-md-4">
				<h2>Rewards</h2>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
			
			<div class="call-to-action col-md-4">
				<h2>Team Up</h2>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>
		</div>
	</section>
	
</div>

<?php

include "includes/footer.php";

?>

