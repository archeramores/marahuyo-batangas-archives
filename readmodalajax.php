<?php
//this is for festive events read modal
$readdb=mysqli_connect("localhost","root","","file_upload");
$id=$_POST['id'];

$festquery="SELECT * FROM fest_dash WHERE id='$id' ";
$execute=mysqli_query($readdb,$festquery);

$result=mysqli_fetch_assoc($execute);
$title=$result['title'];
$text=$result['text'];
$location=$result['location'];
$month=$result['month'];
$image=$result['image'];

$response='<form>
                <div class="form-group">
                    <p class="h3"> '.$title.'</p>
                </div> 
                
                <div class="form-group">  
                    <p ><i><b>'.$location.', Batangas</i></p>
                    <p>Month of '.$month.'</b></p>
                    
                </div>

                <div class="form-group" align="center">
                <img src="./images/'.$image.'" class="img-fluid " style="width:80%;">
                </div>

                <div class="form-group">
                    <p style="text-align:justify; text-indent: 50px;">'.$text.'</p>
                </div>
            </form> ';
echo $response;

?>