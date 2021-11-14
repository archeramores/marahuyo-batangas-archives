<?php
$heritconn= mysqli_connect("localhost", "root","");
$heritdb= mysqli_select_db($heritconn, 'file_upload');


if (isset($_POST['updatedata'])) {
    $id= $_POST['update_id'];
    $title = $_POST['update_title'];
    $location= $_POST['update_location'];
    $month = $_POST['update_month'];
    $text = $_POST['text'];
    $image = $_FILES['up_image']['name'];
    $target ="../images/".basename($_FILES['up_image']['name']);

    $heritQry = "UPDATE herit_dash SET image='$image', title='$title', location='$location',text='$text' WHERE id='$id'";
    $heritQryRun= mysqli_query($heritconn, $heritQry);

    if ($heritQryRun) {
        header("location: heritDash.php?editsuccessful");
    } else {
        echo "<script>alert ('There was a problem updating the archive');</script>";
        
    }
    move_uploaded_file($_FILES['up_image']['tmp_name'], $target);
}
?>
