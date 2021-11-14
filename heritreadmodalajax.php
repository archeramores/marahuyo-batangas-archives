<?php
//this is for intangible heri read modal
$readdb=mysqli_connect("localhost","root","","file_upload");
$id=$_POST['id'];

$heritquery="SELECT * FROM herit_dash WHERE id='$id' ";
$execute=mysqli_query($readdb,$heritquery);

$result=mysqli_fetch_assoc($execute);
$title=$result['title'];
$text=$result['text'];
$location=$result['location'];

$image=$result['image'];

$response='<form>
                <div class="form-group">
                    <p class="h3"> '.$title.'</p>
                </div> 
                
                <div class="form-group">  
                    <p ><i><b>'.$location.', Batangas</b></i></p>
                    
                    
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