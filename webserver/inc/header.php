<?php
include 'database.php';
if (!isset($_SESSION)) { session_start(); }

$username = $_SESSION['username'];

if (($_SESSION['rank']) == "0") {
	die(header("Location: email.php"));
}
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


<nav class="navbar navbar-inverse navbar-static-top primaryNav">
	<div class="container">
		<!-- LOGO -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">PHPLICENCE</a>
		</div>
		<!--MENU ITEMS-->
		<div class="collapse navbar-collapse" id="mainNavBar">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Dashboard</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/newproject.php">New Project</a></li>
						<li><a href="/viewproject.php">View Projects</a></li>
						<li><a href="/manageproject.php">Manage Projects</a></li>
					</ul>
				</li>
				<?php
				if (($_SESSION['rank']) == "5") {
					echo '
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/admin/dashboard.php">Dashboard</a></li>
					</ul>
				</li>
				';	
				}
				?>
			</ul>
			
			<!-- RIGHT ALLIGN-->
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, 
					<?php 
					echo $username;
					?> 
					
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="lib/logout.php">Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>