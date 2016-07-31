<?php

$myhost = "localhost";
$myuser = "phplicence_user";
$mypass = "C{vG{A+;,@OV";
$mydb = "phplicence";

$con = mysqli_connect($myhost, $myuser, $mypass, $mydb);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>