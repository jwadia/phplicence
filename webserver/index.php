<?php
include 'inc/database.php';

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

include 'inc/header.php';
?>

<html>
<div class="mainHeader">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 clearfix">
				<h1>Dashboard</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row m-top-md">
		<div class="col-lg-3 col-sm-6">
			<div class="statistic-box bg-danger m-bottom-md">
				<div class="statistic-title">
					Projects
				</div>

				<div class="statistic-value">
					<?php
					$results = $con->query("SELECT * FROM projects WHERE username = '" . $username . "'");
					echo mysqli_num_rows($results);
					?>
				</div>

				<div class="m-top-md">Number Of Active Projects</div>

				<div class="statistic-icon-background">
					<i class="ion-eye"></i>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-sm-6">
			<div class="statistic-box bg-info m-bottom-md">
				<div class="statistic-title">
					Total Licences
				</div>

				<div class="statistic-value">
					<?php
					$results = $con->query("SELECT * FROM purchases WHERE username = '" . $username . "'");
					echo mysqli_num_rows($results);
					?>
				</div>

				<div class="m-top-md">Total Licences Distributed</div>

				<div class="statistic-icon-background">
					<i class="ion-stats-bars"></i>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-sm-6">
			<div class="statistic-box bg-warning m-bottom-md">
				<div class="statistic-title">
					Join Date
				</div>

				<div class="statistic-value">
					<?php
					$results = $con->query("SELECT date FROM `users` WHERE username = '" . $username . "'");
					while($row = $results->fetch_assoc()) {
						echo $row["date"];
					}
					?>
				</div>

				<div class="m-top-md">User Join Date</div>

				<div class="statistic-icon-background">
					<i class="ion-person-add"></i>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-sm-6">
			<div class="statistic-box bg-success m-bottom-md">
				<div class="statistic-title">
					Subscription
				</div>
				<div class="statistic-value">
					Yes
				</div>
				<div class="top-md">Free Plan</div>

				<div class="statistic-icon-background">
					<i class="ion-ios7-cart-outline"></i>
				</div>
			</div>
		</div>
	</div>
</div>
</html>
