<?php
require('inc/dbcon.php');
$conn = connect();
session_start();

$pemail = isset($_POST['pemail']) ? $_POST['pemail'] : '';
$ppin = isset($_POST['ppin']) ? $_POST['ppin'] : '';

$name = $_SESSION["name"];

$sql = "INSERT INTO `paypal`(`Cust_name`, `pemail`, `ppin`) VALUES ('$name','$pemail','$ppin')";
$result2 = mysqli_query($conn, $sql);
if ($result2) {
   
    // Set session variables
    $pemail = $_SESSION["pemail"];
    $ppin = $_SESSION["ppin"];
    header("location:dates.php");
}

//echo "Session variables are set.";
