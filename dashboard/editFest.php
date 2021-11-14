<?php
$festconn= mysqli_connect("localhost", "root","");
$festdb= mysqli_select_db($festconn, 'file_upload');


if (isset($_POST['updatedata'])) {
    $id= $_POST['update_id'];
    $title = $_POST['update_title'];
    $location= $_POST['update_location'];
    $month = $_POST['update_month'];
    $text = $_POST['text'];
    $image = $_FILES['up_image']['name'];
    $target ="../images/".basename($_FILES['up_image']['name']);

    $festQry = "UPDATE fest_dash SET image='$image', title='$title', location='$location', month='$month', text='$text' WHERE id='$id'";
    $festQryRun= mysqli_query($festconn, $festQry);

    if ($festQryRun) {
        header("location: festDash.php?editsuccessful");
    } else {
        echo "<script>alert ('There was a problem updating the archive');</script>";
        
    }
    move_uploaded_file($_FILES['up_image']['tmp_name'], $target);
}
?>
