<header>

	<nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Chore Wheel</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
		  <? if ( !isset($_SESSION['username']) ){ ?>
			<li><a href="register.php">Create Account</a></li>
			<li><a href="login.php">Login</a></li>
		  <? } else { ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="teams.php">Teams</a></li>
					<li><a href="chores.php">Chores</a></li>
					<li><a href="rewards.php">Rewards</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</li>
		  <? } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

</header>

