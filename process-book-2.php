<?php
require('inc/dbcon.php');
$conn=connect();

$floor = isset($_POST['floor']) ? $_POST['floor'] : '';
echo $floor;
$spot = isset($_POST['spot']) ? $_POST['spot'] : '';

$plateno = isset($_POST['plateno']) ? $_POST['plateno'] : '';

$sql = "SELECT * FROM cost_tbl WHERE floor='$floor'";
$result = mysqli_query($conn, $sql);

if($result)
{
echo "success";

$count=mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result))
{
   $cost = $row["cost"];
} 

session_start();
// Set session variables
$_SESSION["cost"] = $cost;
$_SESSION["floor"] = $floor;
$_SESSION["spot"] = $spot;
$_SESSION["plateno"] = $plateno;

header("location:visa.php");
}

?>