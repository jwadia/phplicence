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

$username = $_SESSION['username'];

include 'inc/database.php';

$url = mysqli_real_escape_string($con, htmlspecialchars($_POST['url']));
$date = mysqli_real_escape_string($con, htmlspecialchars($_POST['date']));
$dateissued = date("m/d/y");
$ip = gethostbyname('outragehost.com');
$licencekey = "OWNED-" . MD5(microtime());
$id = mysqli_real_escape_string($con, htmlspecialchars($_GET['id']));

$insert = mysqli_query($con, "INSERT INTO `licences` (projectid, serverip, website, licencekey, status, dateissued, expirationdate, username) VALUES ('$id', '$ip', '$url', '$licencekey', '1', '$dateissued', '$date', '$username')") or die(mysqli_error($con));

if(!$insert){
die("There's little problem: ".mysqli_error());
}

header("Location: managelicences.php?id=". $id ." &status=added");
?>