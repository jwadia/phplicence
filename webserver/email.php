<?php
include 'inc/database.php';
if (!isset($_SESSION)) { session_start(); }
$_SESSION = array(); 

session_destroy(); 

$username = $_SESSION['username'];
$status = mysqli_real_escape_string($con, htmlspecialchars($_GET['id']));
if ($status != '') {
	$sql = "UPDATE `users` SET rank='1' WHERE uuid='$status'";
	if($con->query($sql) === True){
		die(header("Location: email.php?action=confirmed"));
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Confirm Email</title>
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
		if ($status == 'confirmed') {
			echo '
			<div class="alert alert-success fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> You have successfully confirmed your email! Login <a href="index.php">here</a>
			</div>
			';
		}
		?>
			<div class="panel panel-default vertical-center">
			<div class="panel-heading">
			Please Enter Your User Id (Found In Email)
			</div>
			<div class="panel-body"> 
			<form action="email.php" method="get">
				<div class="forum-group">
					<input type="text" class="form-control" id="id" name="id"  placeholder="Id">
				</div>
				<br />
				<div class="forum-group">
					<input type="submit" id="submit" class="btn btn-lg btn-success btn-block" value="Submit"/>
				</div>
			</form>
			<div class="padding-top-10">
				<p>Don't receive an email?<a href="contact.php"> Contact Support!</a></p>
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

