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
<title> Manage Projects | PHPLICENCE </title>
<div class="mainHeader">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 clearfix">
				<h1>Manage Projects</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<table class="table table-bordered">
				<thead>
				<tr>
				  <th>Project</th>
				  <th>Manage Licences</th>
				  <th>Manage Project</th>
				</tr>
			  </thead>
			  <tbody>
<?php
$results = $con->query("SELECT  name, id FROM projects WHERE username = '" . $username .  "'");

if(mysqli_num_rows($results)>0){
		while($row = $results->fetch_assoc()) {
			$name = $row['name'];
			$secret_key = $row['secret_key'];
			$licences = 0;
			$id = $row['id'];
			echo '<tr>';
			echo '<th scope="row">' . $name . '</th>';
			echo '<th> <a href="managelicences.php?id='. $id .'" class="btn btn-info" role="button">Manage Licences</a> </th>';
			echo '<td> <a href="editprojects.php?id='. $id .'" class="btn btn-warning" role="button">Manage Project</a> </td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</div></div></div>';
}
?>
</html>