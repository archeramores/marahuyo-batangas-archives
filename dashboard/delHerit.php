<!--This p[hp file is used in order for the delete functionality of intangible heritage dashboard be effective-->

<?php
$dbherit=mysqli_connect("localhost", "root","", "file_upload");

$id=$_GET['id'];
$delherit= mysqli_query($dbherit, "DELETE FROM herit_dash WHERE id='$id'" );
 if ($delherit) {
     mysqli_close($dbherit);
     header("location: heritDash.php?recorddeleted");
     exit;
 }else {
    echo "Error deleting record";
 }
?>