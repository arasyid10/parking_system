<?php

require('inc/dbcon.php');
$conn=connect();


// username and password sent from form
$name= isset($_POST['cname']) ? $_POST['cname'] : '';
$email= isset($_POST['cemail']) ? $_POST['cemail'] : '';
$comment= isset($_POST['comment']) ? $_POST['comment'] : '';




$sql="insert into feedback(name,email,feedback) values('$name','$email','$comment')";
$result=mysqli_query($conn,$sql);

if($result)
{
    header("location:index.php");
}
else {
echo "Wrong content";
}
?>