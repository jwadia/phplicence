<?php

$myhost = "localhost";
$myuser = "thesocom_user";
$mypass = "Heya1234$";
$mydb = "thesocom_phplicence";

$con = mysqli_connect($myhost, $myuser, $mypass, $mydb);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die; // No point in running past this point with no database.
}

?>
