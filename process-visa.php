<?php

use SecurityService\securityService;

require('inc/dbcon.php');
require('func/securityService.php');
$conn = connect();

$cardno = isset($_POST['cardno']) ? $_POST['cardno'] : '';
$edate = isset($_POST['edate']) ? $_POST['edate'] : '';
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
//$token = isset($_POST['token']) ? $_POST['token'] : '';
session_start();
$name = $_SESSION["name"];
$hash = new securityService;
$_SESSION['token'] =$hash->getCSRFToken();
$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
echo $token ;
echo "<br>". $_SESSION['token'] ;
if(!isset($_SESSION['token']) || !$hash->validateCSRFToken( $_SESSION['token'])){
    // show an error message
    echo '<p class="error">Error: invalid form submission</p>';
    // return 405 http status code
    header($_SERVER['SERVER_PROTOCOL'] . '405 Method Not Allowed');
    exit;
}
echo 'Database masuk';
/*
$sql2 = "INSERT INTO `visa`(`Cust_name`, `cardno`, `edate`, `cvv`) VALUES ('$name ','$cardno','$edate','$cvv')";
$result = mysqli_query($conn, $sql2);
if ($result) {
    header("location:dates.php");
    $cardno=@$_SESSION["cardno"];
    $edate=@$_SESSION["edate"];
    $cvv=@$_SESSION["cvv"];

}*/

