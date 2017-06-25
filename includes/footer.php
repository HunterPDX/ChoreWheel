<footer>
	<div class="container">
		<div class="copyright"><a href="http://www.hunterpdx.com" target="_blank">&copy; HunterPDX 2016</a></div>
	</div>
</footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- Custom Site scripts
	======================== -->
	<script src="js/scripts.js"></script>

	<!-- Debuggin -->
	<? if (isset($_SESSION['account_id'])){ ?>
	<script>
		console.log('Hello: <?=$_SESSION["account_id"]?>');
	</script>
	<? } ?>
</body>
</html>