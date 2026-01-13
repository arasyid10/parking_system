<?php
require('inc/dbcon.php');
session_start();
$conn = connect();
//mpesa payment
$mphone=@$_SESSION["mphone"];
$mpin=@$_SESSION["mpin"];
//visa payment
$cardno=@$_SESSION["cardno"];
$edate=@$_SESSION["edate"];
$cvv=@$_SESSION["cvv"];
//paypal payment
$pemail=@$_SESSION["pemail"];
$ppin=@$_SESSION["ppin"];

//beginning
$model = $_SESSION["model"];
$vehicle = $_SESSION["vehicle"];
//the next
$cost=$_SESSION["cost"];
$floor=$_SESSION["floor"];
$spot=$_SESSION["spot"];
$plateno=$_SESSION["plateno"];
//status
$status = "RESERVED";

//dates
$from = $_SESSION["from"];
$to = $_SESSION["to"];
$charge = "60";
$email=$_SESSION["email"];
$name=$_SESSION["name"];
/*CHECK IF RESERVED */

$sql = "SELECT * FROM reserved_spots WHERE floor='$floor' and spot='$spot'";
$result = mysqli_query($conn, $sql);
// Mysql_num_row is counting table row
$count = mysqli_num_rows($result);
if ($count == 1) {
	header('location:error-book.php');
} else {

	$query = "INSERT INTO `reserved_spots` (floor, spot, status, model,vehicle,platenumber,email,d1,d2) VALUES ('$floor', '$spot', '$status', '$model' , '$vehicle', '$plateno', '$email','$from','$to')";
	$result = mysqli_query($conn, $query);

	$var = $_SESSION["from"];
	$date = str_replace('/', '.', $var);
	echo date('Y.m.d', strtotime($date));

	if ($result) {
		header('location:success-book.php');
	}
}

