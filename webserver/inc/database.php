<?php

$myhost = "localhost";
$myuser = "XXX";
$mypass = "XXX";
$mydb = "XXX";

$con = mysqli_connect($myhost, $myuser, $mypass, $mydb);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>