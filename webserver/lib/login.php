<?php
error_reporting(0);

include '../inc/database.php';

session_start();

$username = mysqli_real_escape_string($con, htmlspecialchars($_POST['username']));
$password = mysqli_real_escape_string($con, htmlspecialchars(md5($_POST['password'])));

$result = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'") or die(mysqli_error($con));
$row = mysqli_fetch_array($result);

$id = $row['id'];

$select_user = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$id'") or die(mysqli_error($con));
$row2 = mysqli_fetch_array($select_user);

$user = $row2['username'];

if($username != $user){
die(header("Location: ../login.php?action=incorrect_login"));
}

$pass_check = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username' AND `id` = '$id'") or die(mysqli_error($con));
$row3 = mysqli_fetch_array($pass_check);

$email = $row3['email'];

$select_pass = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username' AND `id` = '$id' AND `email` = '$email'") or die(mysqli_error($con));
$row4 = mysqli_fetch_array($select_pass);

$real_password = $row4['password'];

if($password != $real_password){
die("Wrong Password!");
}

$email = $row['email'];
$rank = $row['rank'];

$_SESSION['id'] = $id;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['email'] = $email;
$_SESSION['rank'] = $rank;

header("Location: ../index.php");

?>