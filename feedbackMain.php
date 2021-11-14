<?php
session_start();
 $feedbackdb=mysqli_connect("localhost","root","","main_web");
 if(isset($_POST['submitFeedback'])){
    $comment=$_POST['comment'];
    $rate=$_POST['rate'];
    $feedbacksql="INSERT INTO feedback (comment) VALUE ('$comment')";
                    
    mysqli_query($feedbackdb, $feedbacksql );
                
    }
                
?>