<?php
if (!isset($_SESSION)) { session_start(); }

if (!isset($_SESSION['username'])) {
echo '
<script language="javascript">
    window.location.href = "login.php"
</script>
';
exit();
}
$username = $_SESSION['username'];
$date = date("Y-m-d");


include 'inc/database.php';
$status = mysqli_real_escape_string($con, htmlspecialchars($_GET['name']));
if ($status != '') {
	$secret_key=MD5(microtime());
	$sql = mysqli_query($con, "INSERT INTO `projects` (secret_key, username, name) VALUES ('$secret_key', '$username', '$status')") or die(mysqli_error($con));

	if($sql){
		die(header("Location: viewprojects.php?action=added"));
	}
}

include 'inc/header.php';
?>

<html>
<title> New Project | PHPLICENCE </title>
<div class="mainHeader">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 clearfix">
				<h1>Add New Project</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="col-xs-6">
		<form action="newproject.php" method="get">
		  <div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control" id="name" name="name">
		  </div>
		  <button id="submit" value="submit" type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>
</html>