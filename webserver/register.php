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
	<title>Login</title>
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
		if ($status == 'email_in_use') {
			echo '
			<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error!</strong> This email is connected to another account!
			</div>
			';
		}
		
		if ($status == 'user_in_use') {
			echo '
			<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error!</strong> This username is connected to another account!
			</div>
			';
		}
		
		if ($status == 'password_error') {
			echo '
			<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error!</strong> Your passwords do not match!
			</div>
			';
		}
		?>
			<div class="panel panel-default">
			<div class="panel-heading">
			Register
			</div>
			<div class="panel-body"> 
			<form action="lib/register.php" method="POST">
				<div class="forum-group padding-top-10">
					<input type="text" class="form-control" id="username" name="username" minlength="4" placeholder="Username" required>
				</div>
				<div class="forum-group padding-top-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
				</div>
				<div class="forum-group padding-top-10">
					<input type="password" class="form-control" id="password" name="password" minlength="4" placeholder="Password" required>
				</div>
				<div class="forum-group padding-top-10">
					<input type="password" class="form-control" id="password_conf" name="password_conf" minlength="4" placeholder="Confirm Password" required>
				</div>
				<br />
				<div class="forum-group">
					<input type="submit" id="submit" class="btn btn-lg btn-success btn-block" value="Register"/>
				</div>
			</form>
			<div class="padding-top-10">
				<p>Have an account?<a href="login.php"> Log In Now!</a></p>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

