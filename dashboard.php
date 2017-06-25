<?php
include "includes/config.php";

$title = "Chore Wheel | Dashboard";
$description = "";

session_start();
include "includes/lockout.php";


include "includes/start.php";
include "includes/header.php";

?>

<div class="container">
	<section id="main">
		<h1>Welcome, <?= $_SESSION['username'] ?>!</h1>
	</section>
</div>



<?
include "includes/footer.php";
?>