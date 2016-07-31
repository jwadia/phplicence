<?php
include 'inc/database.php';

if (!isset($_SESSION)) { session_start(); }

if (isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "index.php"
</script>
';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<style>
body {
    background: url(img/bg.jpg) no-repeat center center fixed;
	background-color: #444;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.vertical-offset-100{
    padding-top:100px;
}
</style>
<body>
<div class="container padding-top-10">
	<div class="vertical-offset-100">
		<div class="col-md-4 col-md-offset-4">
		<?php
		$status = $_GET['action'];
		if ($status == 'registered') {
			echo '
			<div class="alert alert-success fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong><br>You have successfully registered for the Exchange Homework Network!
			</div>
			';
		}
		
		if ($status == 'incorrect_login') {
			echo '
			<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error!</strong> Wrong Credentials!
			</div>
			';
		}
		?>
			<div class="panel panel-default vertical-center">
			<div class="panel-heading">
			Please Sign In
			</div>
			<div class="panel-body"> 
			<form action="lib/login.php" method="POST">
				<div class="forum-group">
					<input type="text" class="form-control" id="username" name="username"  placeholder="Username">
				</div>
				<div class="forum-group padding-top-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
				<br />
				<div class="forum-group">
					<input type="submit" id="submit" class="btn btn-lg btn-success btn-block" value="Log In"/>
				</div>
			</form>
			<div class="padding-top-10">
				<p>Don't have an account?<a href="register.php"> Create one now!</a></p>
			</div>
			</div>
			</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</div>
</body>
</html>

