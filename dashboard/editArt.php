<?php
$artconn= mysqli_connect("localhost", "root","");
$artdb= mysqli_select_db($artconn, 'file_upload');


if (isset($_POST['updatedata'])) {
    $id= $_POST['update_id'];
    $title = $_POST['update_title'];
    $artist=$_POST['artist'];
    $text = $_POST['text'];
    $image = $_FILES['up_image']['name'];
    $target ="../images/".basename($_FILES['up_image']['name']);

    $artQry = "UPDATE art_dash SET image='$image', title='$title', text='$text', artist='$artist' WHERE id='$id'";
    $artQryRun= mysqli_query($artconn, $artQry);

    if ($artQryRun) {
        header("location: artDash.php?editsuccessful");
    } else {
        echo "<script>alert ('There was a problem updating the archive');</script>";
        
    }
    move_uploaded_file($_FILES['up_image']['tmp_name'], $target);
}
?>
