<?php
//this is for culture art read modal
$readdb=mysqli_connect("localhost","root","","file_upload");
$id=$_POST['id'];

$artquery="SELECT * FROM art_dash WHERE id='$id' ";
$execute=mysqli_query($readdb,$artquery);

$result=mysqli_fetch_assoc($execute);
$title=$result['title'];
$text=$result['text'];
$artist=$result['artist'];

$image=$result['image'];

$response='<form>
                <div class="form-group">
                    <p class="h3" style="text-transform:uppercase;"> '.$title.'</p>
                </div> 
                
                <div class="form-group">  
                    <p ><i>'.$artist.'</i></p>
                    
                    
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