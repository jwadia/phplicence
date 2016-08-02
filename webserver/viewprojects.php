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

$date = date("Y-m-d");


include 'inc/database.php';
include 'inc/header.php';
?>

<html>
<title> View Project | PHPLICENCE </title>
<div class="mainHeader">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 clearfix">
				<h1>View Projects</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="col-xs-12">
		<?php
		$status = $_GET['action'];
		if ($status == 'added') {
			echo '
			<div class="alert alert-success fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong><br>You have successfully added a new project!
			</div>
			';
		}
		?>
	</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-bordered">
				<thead>
				<tr>
				  <th>Project</th>
				  <th>Licences Distrobuted</th>
				  <th>Secret Key</th>
				</tr>
			  </thead>
			  <tbody>
<?php
$results = $con->query("SELECT  name, secret_key FROM projects WHERE username = '" . $username .  "'");

if(mysqli_num_rows($results)>0){
		while($row = $results->fetch_assoc()) {
			$name = $row['name'];
			$secret_key = $row['secret_key'];
			$licences = 0;
			
			echo '<tr>';
			echo '<th scope="row">' . $name . '</th>';
			echo '<th>' . $licences . '</th>';
			echo '<td>' . $secret_key . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</div></div></div>';
}
?>
</div>