<?php

require('inc/dbcon.php');
$conn = connect();

// username and password sent from form
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

$sql = "INSERT INTO `users`(`name`, `email`, `password`, `phone`) VALUES ('$name','$email','$password','$phone')";
$result = mysqli_query($conn, $sql);

if ($result) {
	header("location:user_login.php");
} else {
	echo "Wrong Username or Password";
}
