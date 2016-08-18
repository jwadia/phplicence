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
<title> View Projects | PHPLICENCE </title>
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
				  <th>Licences Distributed</th>
				  <th>Access Keys</th>
				</tr>
			  </thead>
			  <tbody>
<?php
$results = $con->query("SELECT * FROM projects WHERE username = '" . $username .  "'");

if(mysqli_num_rows($results)>0){
	$i=0;
		while($row = $results->fetch_assoc()) {
			$name = $row['name'];
			$id = $row['id'];
			$secret_key = $row['secret_key'];
			$public_key = $row['public_key'];
			$results2 = $con->query("SELECT * FROM licences WHERE projectid = '". $id ."'");
			$i++;
			$licences = mysqli_num_rows($results2);
			echo '<tr>';
			echo '<th scope="row">' . $name . '</th>';
			echo '<th>' . $licences . '</th>';
			echo '<td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#key'. $i .'">Secret Key</button> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#public'. $i .'">Public Key</button></td>';
			echo '</tr>';
			echo '
			<!-- Modal -->
			<div id="key'. $i .'" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Secret Key</h4>
				  </div>
				  <div class="modal-body">
					<p>'. $secret_key .' </p>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div> ';
			
			echo '
			<!-- Modal -->
			<div id="public'. $i .'" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Public Key</h4>
				  </div>
				  <div class="modal-body">
					<p>'. $public_key .' </p>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div> ';
		}
		echo '</tbody>';
		echo '</div></div></div>';
}
?>
</div>
</html>