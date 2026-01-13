<?php

require('inc/dbcon.php');
$conn=connect();


// username and password sent from form
$email= isset($_POST['email']) ? $_POST['email'] : '';
echo $email;
//$email=$_POST['email'];

$password= isset($_POST['pass']) ? $_POST['pass'] : '';
//$password=$_POST['pass'];

// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn,$password);

$sql="SELECT * FROM users WHERE email='$email' and password='$password'";
$result=mysqli_query($conn,$sql);

if(!$result)
{
    echo "issue";
}

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
//Name variable
while($row = mysqli_fetch_assoc($result))
{
   $name = $row["name"];
} 
// Register $myusername, $mypassword and redirect to file "login_success.php"
// Start the session
session_start();
// Set session variables
$_SESSION["email"] = $email;
$_SESSION["password"] = $password;
$_SESSION["name"] = $name;
//echo "Session variables are set.";
header("location:sucess_login.php");
}
else {
echo "Wrong Username or Password";
}
?>