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
<div class="container padding-bottom-10">
	<button type="button" class="btn btn-info btn-xl" data-toggle="modal" data-target="#addlicence">Add Licence</button>
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
			  </html>
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
<html>
<br>
<br>
<!-- Modal content-->
<div id="addlicence" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Add Licence</h4>
  </div>
  <div class="modal-body">
	<form action="addlicence.php?id=<?php 
	$id = mysqli_real_escape_string($con, htmlspecialchars($_GET['id']));
	echo $id;
	?>" method="POST">
	<div class="forum-group padding-top-10">
		<input type="text" class="form-control" id="url" name="url" minlength="4" placeholder="Website Url" required>
	</div>
	<div class="forum-group padding-top-10">
		<input type="text" class="form-control" id="date" name="date" placeholder="Expiration date (mm/dd/yy)" required>
	</div>
	<br />
	<div class="forum-group">
		<input type="submit" id="submit" class="btn btn-lg btn-success btn-block" value="Add"/>
	</div>
</form>
  </div>
  <div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

</div>
</html>