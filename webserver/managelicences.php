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

$id = mysqli_real_escape_string($con, htmlspecialchars($_GET['id']));

?>
<html>
<title> Manage Licences | PHPLICENCE </title>
<div class="mainHeader">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 clearfix">
				<h1>Manage Licences</h1>
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
				  <th>Website</th>
				  <th>Ip</th>
				  <th>Licence Key</th>
				  <th>Status</th>
				  <th>Date Issued</th>
				  <th>Expriation Date</th>
				  <th>Manage</th>
				</tr>
			  </thead>
			  <tbody>
<?php
$results = $con->query("SELECT  id, website, serverip, licencekey, status, dateissued, expirationdate FROM licences WHERE projectid = '" . $id .  "' AND username = '". $username ."'");

if(mysqli_num_rows($results)>0){
		while($row = $results->fetch_assoc()) {
			$id = $row['id'];
			$website = $row['website'];
			$ip = $row['serverip'];
			$licencekey = $row['licencekey'];
			$status = $row['status'];
			$dateissued = $row['dateissued'];
			$expirationdate = $row['expirationdate'];
			
			echo '<tr>';
			echo '<th>' . $website . '</th>';
			echo '<th>' . $ip . '</th>';
			echo '<th>' . $licencekey . '</th>';
			echo '<th>' . $status . '</th>';
			echo '<th>' . $dateissued . '</th>';
			echo '<th>' . $expirationdate . '</th>';
			echo '<th><a href="reissue.php?id='. $id .'" class="btn btn-success" role="button">Reissue</a> <a href="licenceedit.php?id='. $id .'" class="btn btn-info" role="button">Edit Info</a></th>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</div></div></div>';
}
?>
</html>