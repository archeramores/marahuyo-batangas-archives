<?php
$dbuser=mysqli_connect("localhost", "root","", "login_dashboard");

$id=$_GET['user_id'];
$deluser= mysqli_query($dbuser, "DELETE FROM users WHERE user_id='$id'" );
 if ($deluser) {
     mysqli_close($dbuser);
     header("location: user.php?recorddeleted");
     exit;
 }else {
    echo "Error deleting record";
 }
?>